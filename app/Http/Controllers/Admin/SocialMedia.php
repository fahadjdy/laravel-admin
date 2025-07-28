<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\SocialMediaModel;

class SocialMedia extends Controller
    {
        public function getAjaxSocialMedia(Request $request)
        {
            $columns = ['id', 'icon', 'name', 'link', 'is_active'];

            // Get total count
            $totalData = SocialMediaModel::count();
            $totalFiltered = $totalData;

            // Search Query
            $query = SocialMediaModel::query();
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('link', 'LIKE', "%{$search}%");
            }

            $totalFiltered = $query->count();

            // Sorting and Pagination
            $socialMedia = $query->offset($request->start)
                                ->limit($request->length)
                                ->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir'])
                                ->get();

            // Format response
            $data = [];
            foreach ($socialMedia as $row) {
                $nestedData['id'] = $row->id;
                $nestedData['icon'] = "<i class='{$row->icon}'></i>";
                $nestedData['name'] = $row->name;
                $nestedData['link'] = "<a href='" . htmlspecialchars($row->link, ENT_QUOTES, 'UTF-8') . "' target='_blank' rel='noopener noreferrer'>" . htmlspecialchars($row->link, ENT_QUOTES, 'UTF-8') . "</a>";
                $nestedData['is_active'] = $row->is_active
                    ? "<button class='btn btn-success btn-sm toggle-status' data-id='{$row->id}'>Active</button>"
                    : "<button class='btn btn-danger btn-sm toggle-status' data-id='{$row->id}'>Inactive</button>";
                $nestedData['actions'] = "<button class='btn btn-warning btn-sm edit-social' data-id='{$row->id}'>Edit</button>
                                        <button class='btn btn-danger btn-sm delete-social' data-id='{$row->id}'>Delete</button>";
                $data[] = $nestedData;
            }

            // Return JSON response
            return response()->json([
                "draw" => intval($request->draw),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            ]);
        }

    public function store(Request $request)
    {
        $validator = SocialMediaModel::validate($request->all());
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $social = SocialMediaModel::create($request->all());
        return response()->json($social);
    }

    public function update(Request $request, $id)
    {

        $validator = SocialMediaModel::validate($request->all());
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $social = SocialMediaModel::find($id);
        $social->update($request->all());
        return response()->json($social);
    }

    public function destroy($id)
    {
        SocialMediaModel::destroy($id);
        return response()->json(['success' => true]);
    }

}
