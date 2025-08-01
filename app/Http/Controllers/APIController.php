<?php

namespace App\Http\Controllers;

use App\Models\PDF;
use App\Models\Crop;
use App\Models\News;
use App\Models\Video;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\AllBanner;
use App\Models\Extension;
use App\Models\Headlines;
use App\Models\Subcenter;
use App\Models\Department;
use App\Models\CropCategory;
use Illuminate\Http\Request;
use App\Models\CropManagement;
use App\Models\DistrictOffice;
use App\Models\UpcomingTender;
use App\Models\CropDiseaseType;
use App\Models\DirectorGeneral;

use App\Models\ProjectDocument;
use App\Models\CropDiseaseSubType;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function uploads_pdfs()
    {
        $pdfs = PDF::all();

        if ($pdfs->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No PDF records found.',
                'data' => []
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'PDFs fetched successfully.',
                'data' => $pdfs
            ]);
        }
    }

    public function crops_categories()
    {
        $categories = CropCategory::all();

        if ($categories->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No Crop Categoreis records found.',
                'data' => []
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'categories fetched successfully.',
                'data' => $categories
            ]);
        }
    }

    public function getCrops(Request $request)
    {
        // Optional: Filter by category_id if provided
        $query = Crop::query();

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $crops = $query->get();

        if ($crops->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No crop records found.',
                'data' => []
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Crops fetched successfully.',
            'data' => $crops
        ]);
    }

    public function getCropManagement(Request $request)
    {
        $query = CropManagement::query();

        // Optional filters
        if ($request->has('crop_id')) {
            $query->where('crop_id', $request->crop_id);
        }

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $managements = $query->get();

        if ($managements->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No crop management records found.',
                'data' => []
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Crop management data fetched successfully.',
            'data' => $managements
        ]);
    }

    public function getCropDiseaseTypes(Request $request)
    {
        $query = CropDiseaseType::query();

        // Optional filters
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('crop_id')) {
            $query->where('crop_id', $request->crop_id);
        }

        $diseaseTypes = $query->get();

        if ($diseaseTypes->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No crop disease types found.',
                'data' => []
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Crop disease types fetched successfully.',
            'data' => $diseaseTypes
        ]);
    }

    public function getCropDiseaseSubTypes(Request $request)
    {
        $query = CropDiseaseSubType::query();

        // Optional filters
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('crop_id')) {
            $query->where('crop_id', $request->crop_id);
        }

        if ($request->has('disease_type_id')) {
            $query->where('disease_type_id', $request->disease_type_id);
        }

        $subTypes = $query->get();

        if ($subTypes->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No crop disease sub-types found.',
                'data' => []
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Crop disease sub-types fetched successfully.',
            'data' => $subTypes
        ]);
    }

     public function news()
    {
        $news = News::all();

        if ($news->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No news records found.',
                'data' => []
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'news fetched successfully.',
                'data' => $news
            ]);
        }
    }
         public function header()
    {
        $header = Department::all();

        if ($header->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No header records found.',
                'data' => []
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'header fetched successfully.',
                'data' => $header
            ]);
        }
    }
          public function banner()
    {
        $banner = Banner::all();

        if ($banner->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No banner records found.',
                'data' => ['sadass']
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'banner fetched successfully.',
                'data' => $banner
            ]);
        }
    }
      public function video()
    {
        $video = Video::all();

        if ($video->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No video records found.',
                'data' => ['sadass']
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'video fetched successfully.',
                'data' => $video
            ]);
        }
    }

        public function subcenter()
    {
        $subcenter = Subcenter::all();

        if ($subcenter->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No subcenter records found.',
                'data' => ['sadass']
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'subcenter fetched successfully.',
                'data' => $subcenter
            ]);
        }
    }

    public function extension(){
         $extension = Extension::all();

        if ($extension->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No extension records found.',
                'data' => ['sadass']
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'extension fetched successfully.',
                'data' => $extension
            ]);
        }
    }

    function director(){
         $DirectorGeneral = DirectorGeneral::all();

        if ($DirectorGeneral->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No DirectorGeneral records found.',
                'data' => ['sadass']
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'DirectorGeneral fetched successfully.',
                'data' => $DirectorGeneral
            ]);
        }
    }

    function headlines(){
            $Headlines = Headlines::all();

        if ($Headlines->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No Headlines records found.',
                'data' => ['sadass']
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'Headlines fetched successfully.',
                'data' => $Headlines
            ]);
        }
    }

    function contact(){
         $Contact = Contact::all();

        if ($Contact->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No Contact records found.',
                'data' => ['sadass']
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'Contact fetched successfully.',
                'data' => $Contact
            ]);
        }
    }

    
    function district(){
         $DistrictOffice = DistrictOffice::all();

        if ($DistrictOffice->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No DistrictOffice records found.',
                'data' => ['sadass']
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'DistrictOffice fetched successfully.',
                'data' => $DistrictOffice
            ]);
        }
    }
  
    function UpcomingTender(){
         $UpcomingTender = UpcomingTender::all();

        if ($UpcomingTender->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No UpcomingTender records found.',
                'data' => ['sadass']
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'UpcomingTender fetched successfully.',
                'data' => $UpcomingTender
            ]);
        }
    }

        function ProjectDocument(){
         $ProjectDocument = ProjectDocument::all();

        if ($ProjectDocument->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No ProjectDocument records found.',
                'data' => ['sadass']
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'ProjectDocument fetched successfully.',
                'data' => $ProjectDocument
            ]);
        }
    }

    
        function allbanner(){
         $AllBanner = AllBanner::all();

        if ($AllBanner->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No AllBanner records found.',
                'data' => ['sadass']
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'AllBanner fetched successfully.',
                'data' => $AllBanner
            ]);
        }
    }
    // store contact information
       public function store(Request $request){
    $validated = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'comments' => 'required|string',
    ]);

    // Save to database
    Contact::create($validated);

    return response()->json(['status' => 'success', 'message' => 'Submitted Successfully']);
}

 public function gallery()
    {
        $Gallery = Gallery::all();

        if ($Gallery->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No Gallery records found.',
                'data' => []
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'Gallery fetched successfully.',
                'data' => $Gallery
            ]);
        }
    }
}
