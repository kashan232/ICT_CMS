<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\CropCategory;
use App\Models\CropDiseaseSubType;
use App\Models\CropDiseaseType;
use App\Models\CropManagement;
use App\Models\PDF;
use Illuminate\Http\Request;
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
}
