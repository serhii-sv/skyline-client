<?php

namespace App\Http\Controllers\AccountPanel;

use App\Http\Controllers\Controller;
use App\Models\UserSticker;
use Illuminate\Http\Request;

class StickerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $stickers = auth()->user()->stickers;
        return view('adminos.pages.stickers.index', compact('stickers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'text_color' => 'required|string|max:255',
            'sticker_color' => 'required|string|max:255',
        ]);

        $sticker = (new UserSticker())->fill([
            'user_id' => auth()->id(),
            'category' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'text_color' => $request->text_color,
            'sticker_color' => $request->sticker_color,
            'order' => UserSticker::count() + 1
        ]);

        if ($sticker->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Стикер успешно создан'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Стикер не был создан'
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $field = $request->field;

        $fieldRules = [
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ];

        $request->validate([
            $field => $fieldRules[$field]
        ]);

        $sticker = UserSticker::findOrFail($id);

        $sticker->fill([
            $field => $request->$field
        ]);

        if ($sticker->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Поле стикера успешно обновлено'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Полу стикера не обновлено'
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateColor(Request $request, $id)
    {
        $request->validate([
            'text_color' => 'required|string|max:255',
            'sticker_color' => 'required|string|max:255',
        ]);

        $sticker = UserSticker::findOrFail($id);

        $sticker->fill([
            'text_color' => $request->text_color,
            'sticker_color' => $request->sticker_color,
        ]);

        if ($sticker->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Цвета стикера успешно обновлены'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Цвета стикера не обновлены'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $sticker = UserSticker::findOrFail($id);

        if ($sticker->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Стикер удален'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Стикер не удален'
        ]);
    }
}
