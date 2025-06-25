<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\CropCategory;
use App\Models\CropDiseaseSubType;
use App\Models\CropDiseaseType;
use App\Models\CropManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CropController extends Controller
{
    public function Category()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('admin_panel.Category.Category');
        } else {
            return redirect()->back();
        }
    }

    public function category_store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle cover photo upload
        $cover = $request->file('category_image');
        $imageName = uniqid() . '.' . $cover->getClientOriginalExtension();
        $cover->move(public_path('categories'), $imageName);
        // Save only filenames in the database
        CropCategory::create([
            'name'       => $request->name,
            'category_image' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Category Created successfully.');
    }

    public function categories_crops()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $cropcategories = CropCategory::all();
            return view('admin_panel.Category.categories_crops', compact('cropcategories'));
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $categories = CropCategory::findOrFail($id);
        return view('admin_panel.Category.edit_Category', compact('categories')); // You can reuse 'create' view with conditional logic
    }

    public function update(Request $request, $id)
    {
        $categories = CropCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle cover photo upload if new one is provided
        if ($request->hasFile('category_image')) {
            $oldCoverPath = public_path('categories/' . $categories->category_image);
            if (File::exists($oldCoverPath)) {
                File::delete($oldCoverPath);
            }
            $coverName = Str::random(15) . '.' . $request->file('category_image')->getClientOriginalExtension();
            $request->file('category_image')->move(public_path('categories'), $coverName);
            $categories->category_image = $coverName;
        }

        // Update other fields
        $categories->name = $request->name;
        $categories->save();

        return redirect()->route('categories')->with('success', 'Category updated successfully!');
    }

    public function Crops()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $categories = CropCategory::all();
            return view('admin_panel.Crops.Crops', compact('categories'));
        } else {
            return redirect()->back();
        }
    }

    public function Crops_store(Request $request)
    {
        if (Auth::id()) {
            // 🧠 Combine 'types' and 'names' into JSON format
            $details = [];
            foreach ($request->types as $index => $type) {
                $details[] = [
                    'type' => $type,
                    'name' => $request->names[$index],
                ];
            }

            $details_json = json_encode($details);

            // 🖼️ Handle image upload
            $imageName = time() . '.' . $request->crop_image->extension();
            $request->crop_image->move(public_path('crops'), $imageName);

            // 💾 Save crop record
            $crop = new Crop();
            $crop->category_id       = $request->category_id;
            $crop->crop_name              = $request->crop_name;
            $crop->crop_image             = $imageName;
            $crop->crop_details           = $request->crop_details;
            $crop->details_type_json = $details_json; // 🟢 Store JSON in one column
            $crop->save();

            return redirect()->back()->with('success', 'Crop successfully added.');
        } else {
            return redirect()->back();
        }
    }

    public function uploads_crops()
    {
        if (Auth::id()) {
            $crops = Crop::with('category')->latest()->get(); // fetch crops + related category
            return view('admin_panel.Crops.uploads_crops', compact('crops'));
        } else {
            return redirect()->back();
        }
    }

    public function crop_edit($id)
    {
        $crop = Crop::findOrFail($id);
        $categories = CropCategory::all();
        $details = json_decode($crop->details_type_json, true);
        return view('admin_panel.Crops.crop_edit', compact('crop', 'categories', 'details'));
    }

    public function crop_update(Request $request, $id)
    {
        $crop = Crop::findOrFail($id);

        // Handle image if uploaded
        if ($request->hasFile('crop_image')) {
            $imageName = time() . '.' . $request->crop_image->extension();
            $request->crop_image->move(public_path('uploads/crops'), $imageName);
            $crop->crop_image = 'uploads/crops/' . $imageName;
        }

        // Prepare JSON details
        $details = [];
        foreach ($request->types as $index => $type) {
            $details[] = [
                'type' => $type,
                'name' => $request->names[$index],
            ];
        }

        $crop->category_id = $request->category_id;
        $crop->crop_name = $request->crop_name;
        $crop->crop_details = $request->crop_details;
        $crop->details_type_json = json_encode($details);
        $crop->save();

        return redirect()->route('Crops.edit', $id)->with('success', 'Crop updated successfully.');
    }

    public function crops_managements()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $categories = CropCategory::all();
            $Crops = Crop::all();
            return view('admin_panel.Crops.crops_managements', compact('categories', 'Crops'));
        } else {
            return redirect()->back();
        }
    }
    public function getByCategory($id)
    {
        return response()->json(Crop::where('category_id', $id)->get());
    }

    public function Crops_Management_store(Request $request)
    {
        if (Auth::id()) {
            $request->validate([
                'category_id' => 'required',
                'crop_id' => 'required|exists:crops,id',
                'management_type' => 'required|array',
                'management_type.*' => 'required|string',
                'management_details' => 'required|array',
                'management_details.*' => 'required|string',
            ]);

            $categoryId = $request->category_id;
            $cropId = $request->crop_id;
            $types = $request->management_type;
            $details = $request->management_details;

            foreach ($types as $index => $type) {
                $detail = $details[$index] ?? null;
                if ($detail) {
                    // Save each management detail with its type
                    CropManagement::create([
                        'category_id' => $categoryId,
                        'crop_id' => $cropId,
                        'management_type' => $type,
                        'management_details' => $detail,
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Crop management data uploaded successfully.');
        } else {
            return redirect()->back();
        }
    }

    public function uploads_crops_management()
    {
        if (Auth::id()) {
            $categories = CropCategory::all();
            $Crops = Crop::all();

            // Join crop_management with crop and crop_category
            $managements = DB::table('crop_management')
                ->join('crops', 'crop_management.crop_id', '=', 'crops.id')
                ->join('crop_categories', 'crop_management.category_id', '=', 'crop_categories.id')
                ->select(
                    'crop_management.*',
                    'crops.crop_name',
                    'crop_categories.name as category_name'
                )
                ->orderBy('crop_management.id', 'desc')
                ->get();

            return view('admin_panel.Crops.uploads_crops_management', compact('categories', 'Crops', 'managements'));
        } else {
            return redirect()->back();
        }
    }

    public function edit_crops_managements($id)
    {
        if (Auth::id()) {
            $categories = CropCategory::all();

            // Fetch all management rows for the given crop ID
            $managementDetails = CropManagement::where('crop_id', $id)->get();

            $management = $managementDetails->first();
            $selectedCategoryId = $management->category_id;

            // Fetch only crops of selected category for initial load
            $filteredCrops = Crop::where('category_id', $selectedCategoryId)->get();

            return view('admin_panel.Crops.edit_crops_managements', compact(
                'categories',
                'filteredCrops',
                'management',
                'managementDetails'
            ));
        } else {
            return redirect()->back();
        }
    }

    public function uploads_Diseases_management()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $categories = CropCategory::all();
            $Crops = Crop::all();
            return view('admin_panel.Crops.uploads_Diseases_management', compact('categories', 'Crops'));
        } else {
            return redirect()->back();
        }
    }

    public function Diseases_upload(Request $request)
    {
        foreach ($request->disease_types as $diseaseData) {
            $diseaseType = new CropDiseaseType();
            $diseaseType->category_id = $request->category_id;
            $diseaseType->crop_id = $request->crop_id;
            $diseaseType->type_name = $diseaseData['type_name'];

            if (isset($diseaseData['image'])) {
                $image = $diseaseData['image'];
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('disease'), $imageName);
                $diseaseType->image = $imageName; // only name goes to DB
            }

            $diseaseType->save();
        }

        return back()->with('success', 'Disease Types added successfully!');
    }

    public function crops_Diseases()
    {
        if (Auth::id()) {
            $categories = CropCategory::all();
            $Crops = Crop::all();
            $managements = DB::table('crop_disease_types')
                ->join('crops', 'crop_disease_types.crop_id', '=', 'crops.id')
                ->join('crop_categories', 'crop_disease_types.category_id', '=', 'crop_categories.id')
                ->select(
                    'crop_disease_types.*',
                    'crops.crop_name',
                    'crop_categories.name as category_name'
                )
                ->orderBy('crop_disease_types.id', 'desc')
                ->get();
            return view('admin_panel.Crops.crops_Diseases', compact('categories', 'Crops', 'managements'));
        } else {
            return redirect()->back();
        }
    }

    public function Diseases_type_management()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $categories = CropCategory::all();
            $Crops = Crop::all();
            return view('admin_panel.Crops.Diseases_type_management', compact('categories', 'Crops'));
        } else {
            return redirect()->back();
        }
    }

    public function getDiseaseTypes(Request $request)
    {
        $types = CropDiseaseType::where('category_id', $request->category_id)
            ->where('crop_id', $request->crop_id)
            ->get();

        return response()->json(['status' => 'success', 'data' => $types]);
    }

    public function storesubtypes(Request $request)
    {
        foreach ($request->sub_diseases as $index => $sub) {
            $imageName = null;

            if ($request->hasFile("sub_diseases.$index.image")) {
                $image = $request->file("sub_diseases.$index.image");
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('disease_subtypes'), $imageName); // Save in public/disease_subtypes
            }

            CropDiseaseSubType::create([
                'category_id'      => $request->category_id,
                'crop_id'          => $request->crop_id,
                'disease_type_id'  => $sub['disease_type_id'],
                'name'             => $sub['name'],
                'control'          => $sub['control'] ?? null,
                'image'            => $imageName, // Store only image name
            ]);
        }

        return back()->with('success', 'Crop Disease Sub Types added successfully!');
    }

    public function crops_Diseases_subtypes()
    {
        if (Auth::id()) {
            $categories = CropCategory::all();
            $Crops = Crop::all();

            $managements = DB::table('crop_disease_types')
                ->join('crops', 'crop_disease_types.crop_id', '=', 'crops.id')
                ->join('crop_categories', 'crop_disease_types.category_id', '=', 'crop_categories.id')
                ->select(
                    'crop_disease_types.*',
                    'crops.crop_name',
                    'crop_categories.name as category_name'
                )
                ->orderBy('crop_disease_types.id', 'desc')
                ->get();

            $subtypes = DB::table('crop_disease_sub_types')
                ->join('crop_disease_types', 'crop_disease_sub_types.disease_type_id', '=', 'crop_disease_types.id')
                ->join('crops', 'crop_disease_sub_types.crop_id', '=', 'crops.id')
                ->join('crop_categories', 'crop_disease_sub_types.category_id', '=', 'crop_categories.id')
                ->select(
                    'crop_disease_sub_types.*',
                    'crops.crop_name',
                    'crop_categories.name as category_name',
                    'crop_disease_types.type_name as disease_type_name'
                )
                ->orderBy('crop_disease_sub_types.id', 'desc')
                ->get();

            return view('admin_panel.Crops.crops_Diseases_subtypes', compact('categories', 'Crops', 'managements', 'subtypes'));
        } else {
            return redirect()->back();
        }
    }
}
