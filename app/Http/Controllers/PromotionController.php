<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::orderBy('start_date', 'desc')->get();
        return view('promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('promotions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'end_date' => 'after:start_date', // Aquí verificamos que la fecha de fin es posterior a la de inicio
        ]);

        $promotion = Promotion::create($request->all());

        // Mensaje de telegram
        $message = "🎬 *¡NUEVA PROMOCIÓN EN CINEMANAGER!* 🍿\n\n";
        $message .= "👉 *" . $promotion->title . "*\n";
        $message .= $promotion->message . "\n\n";
        $message .= "📅 *Inicio:* " . $promotion->start_date->format('d/m/Y H:i') . "\n";
        $message .= "⏳ *Fin:* " . $promotion->end_date->format('d/m/Y H:i') . "\n\n";
        $message .= "¡Te esperamos! 🎥";

        \Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            'parse_mode' => 'Markdown',
            'text' => $message
        ]);

        return redirect()->route('promotions.index')->with('info', 'Promoción creada');
    }

    public function edit($id)
    {
        $promotion = Promotion::find($id);
        return view('promotions.edit', compact('promotion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'end_date' => 'after:start_date', // Aquí verificamos que la fecha de fin es posterior a la de inicio
        ]);

        $promotion = Promotion::find($id);
        $promotion->update($request->all());

        return redirect()->route('promotions.index')->with('info', 'Promoción actualizada');
    }

    public function destroy($id)
    {
        $promotion = Promotion::find($id);

        $promotion->delete();

        return redirect()->route('promotions.index')->with('info', 'Promoción eliminada');
    }
}
