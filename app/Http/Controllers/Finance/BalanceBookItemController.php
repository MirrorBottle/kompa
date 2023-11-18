<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\BalanceBook;
use App\Models\BalanceBookItem;
use Illuminate\Http\Request;

class BalanceBookItemController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $book = BalanceBook::findOrFail($id);
        return view("finance.balance-book-items.create", compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookItem = BalanceBookItem::create($request->all());
        return redirect()->route("finance.balance-books.edit", $bookItem->balance_book_id)->with('success','Data pengelluaran berhasil dibuat!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BalanceBookItem $balanceBookItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BalanceBookItem $balanceBookItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bookItem = BalanceBookItem::findOrFail($id);
        $balanceBookId = $bookItem->balance_book_id;
        $bookItem->delete();
        return redirect()->route("finance.balance-books.edit", $balanceBookId)->with('success','Data pengelluaran berhasil dihapus!');

    }
}
