<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$model= product::all();//بجيب كل البيانات من الداتا بيز
        //$model= product::latest();//بخلي اخر اشي مضاف بالداتا هو الي يظهر اول
        $model= product::latest()->paginate(6);//الفنكشن هاذ بتقدر تعرض منتجاتك على شكل صفحات وانت بتحدد كم بدك تعرض منتجات بكل صفحة بس بتحط العدد بين القوسين
        return view('product.index',compact('model'));//فنكشن ببعث المودل للصفحةcompact
    }

    public function trashed()
    {
        $model= product::onlyTrashed()->latest()->paginate(6);//الفنكشن هاذ بتقدر تعرض منتجاتك على شكل صفحات وانت بتحدد كم بدك تعرض منتجات بكل صفحة بس بتحط العدد بين القوسين
        return view('product.trash',compact('model'));//فنكشن ببعث المودل للصفحةcompact
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'details'=>'required'
        ]);//عشان السيكيورتي وتتاكد انه اليوزر دخل كل المعلومات
        $product = product::create($request->all());
        return Redirect()->route('product.index')// برجع المستخدم للصفحة الي مختارها انت جوا الروت وممكن مع مسج بل with
        ->with('success','product added succesflly');//هذي الرسالة
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
       return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'details'=>'required'
        ]);

        $product->update($request->all());
        return redirect()->route('product.index')
        ->with ('success','product updated successflly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('product.index')
        ->with ('success','product deleted successflly');
    }

    public function softDelete($id)
    {
        $product = product::find($id)->delete();
        return redirect()->route('product.index')
        ->with ('success','productsoft deleted successflly');
    }

    public function backProduct($id)
    {
        $product = product::onlyTrashed()->where('id',$id)->first()->restore();//حطينا فيرست عشان نضمن يرجع برودكت واحد
        return redirect()->route('product.trash')
        ->with ('success','product backed successflly');
    }

    public function DeleteForEver($id)
    {
        $product = product::onlyTrashed()->where('id',$id)->forceDelete();//فنكشن الفورس ديليت هاذ بحذفها من الداتا بيز كمان
        return redirect()->route('product.index')
        ->with ('success','product deleted successflly');
    }
}
