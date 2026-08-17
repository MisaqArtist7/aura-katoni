<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Models\Address;
use App\Traits\Logger;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    use Logger;
    public function __construct(public Address $model){}

    public function store(StoreAddressRequest $request)
    {
        try {
            $this->model->create($request->validated());
            return redirect()->back()->with('success', 'آدرس با موفقیت ذخیره شد');
        }catch (\Exception $e){
            $this->logError('failed to save address', [
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
            return redirect()->back()->with('error','در حین ذخیره آدرس مشکلی رخ داده است');
        }
    }

    public function update(StoreAddressRequest $request, $id)
    {
        try {
            $address = $this->model->find($id);
            $address->update($request->validated());
            return redirect()->back()->with('success', 'آدرس با موفقیت به روز رسانی شد');
        }catch (\Exception $e){
            $this->logError('failed to update address', [
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
            return redirect()->back()->with('error','در حین به روزرسانی آدرس مشکلی رخ داده است');
        }
    }

    public function destroy(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'id' => 'required|exists:addresses,id'
        ], [
            'id.required' => 'شناسه آدرس الزامی است',
            'id.exists'   => 'آدرس مورد نظر یافت نشد'
        ]);

        try {
            $address = $this->model->findOrFail($request->id);

            if ($address->user_id !== auth()->id()) {
                return redirect()->back()->with('error', 'شما اجازه حذف این آدرس را ندارید');
            }

            $address->delete();

            return redirect()->back()->with('success', 'آدرس با موفقیت حذف شد');
        } catch (\Exception $e) {
            $this->logError('failed to delete address', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return redirect()->back()->with('error', 'عملیات حذف آدرس با خطا مواجه شده است');
        }
    }

}
