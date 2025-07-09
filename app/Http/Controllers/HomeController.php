<?php   
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Crop;
use App\Models\CropCategory;
use App\Models\CropDiseaseSubType;
use App\Models\CropDiseaseType;
use App\Models\CropManagement;
use App\Models\PDF;
class HomeController extends Controller // Assuming this is your AdminController
{
  public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();

            if ($usertype == 'user') {
                return view('user_panel.dashboard', [
                    'userId' => $userId,
                ]);
            } else if ($usertype == 'admin') {
                // Fetch total counts for admin dashboard
                $totalCrops = Crop::count();
                $totalCropCategories = CropCategory::count();
                $totalCropDiseaseSubTypes = CropDiseaseSubType::count();
                $totalCropDiseaseTypes = CropDiseaseType::count();
                $totalCropManagements = CropManagement::count();
                $totalPDFs = PDF::count();

                // Specific PDF type counts
                $fieldGuides = PDF::where('pdf_type', 'Field Guide')->count();
                $booklets = PDF::where('pdf_type', 'Booklet')->count();
                $publications = PDF::where('pdf_type', 'Publication')->count();
                $magazines = PDF::where('pdf_type', 'Magazines')->count();

                return view('admin_panel.dashboard', [
                    'userId' => $userId,
                    'totalCrops' => $totalCrops,
                    'totalCropCategories' => $totalCropCategories,
                    'totalCropDiseaseSubTypes' => $totalCropDiseaseSubTypes,
                    'totalCropDiseaseTypes' => $totalCropDiseaseTypes,
                    'totalCropManagements' => $totalCropManagements,
                    'totalPDFs' => $totalPDFs,
                    'fieldGuides' => $fieldGuides,
                    'booklets' => $booklets,
                    'publications' => $publications,
                    'magazines' => $magazines,
                ]);
            } else {
                return redirect()->back();
            }
        }
    }
}