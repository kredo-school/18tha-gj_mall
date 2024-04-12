<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Users\Seller;
use App\Models\Users\Country;
use App\Models\Users\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    const LOCAL_FOLDER_PATH = 'public/images/sellers/';
    private $seller , $country , $address;

    public function __construct(Seller $seller , Country $country ,Address $address)
    {
        $this->seller = $seller;
        $this->country = $country;
        $this->address = $address;
    }

    public function show()
    {
        $target_seller = $this->seller->findOrFail(Auth::guard('seller')->id());
        $countries = $this->country->all();

        return view('seller.profile.editProfile')
                ->with('seller', $target_seller)
                ->with('countries', $countries);
    }

    public function update(Request $request)
    {

        $id = Auth::guard("seller")->id();
        DB::beginTransaction();
        $validatedData = $request->validate([
            // Profile
            'fname'        => 'required|max:255',
            'lname'        => 'required|max:255',
            'email'        => 'required|email',
            'phone'        => 'nullable',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'  => 'nullable',

            // Address
            'unitnumber'  => 'max:255',
            'street'    => 'max:255',
            'address1'  => 'required|max:255',
            'address2'  => 'max:255',
            'city'      => 'required|max:255',
            'postalcode'  => 'required|max:12',
            'country'   => 'required',

        ]);

        $seller = Seller::findOrFail($id);

        if($seller->address_id){
            try {
                // Find the relevant models
                $address = Address::findOrFail($seller->address_id);

                // Update customer details
                $seller->first_name = $validatedData['fname'];
                $seller->last_name = $validatedData['lname'];
                $seller->email = $validatedData['email'];
                $seller->phone_number = $validatedData['phone'];
                $seller->description = $validatedData['description'];

                if($request->image) {
                    $this->deleteImage($seller->image);
                    $seller->avatar = $this->saveImage($request);
                }

                $seller->save();

                // Update address details
                $address->unit_number = $validatedData['unitnumber'];
                $address->street_number = $validatedData['street'];
                $address->address_line1 = $validatedData['address1'];
                $address->address_line2 = $validatedData['address2'];
                $address->postal_code = $validatedData['postalcode'];
                $address->city = $validatedData['city'];
                $address->country_code = $validatedData['country'];
                $address->region = $this->getRegion($validatedData['country']);

                $address->save();

                DB::commit();

                return redirect()->route('seller.profile.editProfile');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Update failed: ' . $e->getMessage());
                return back()->with('error', 'Failed to update seller information.');
            }
        } else {
            try {
                // Update customer details
                $seller->first_name = $validatedData['fname'];
                $seller->last_name = $validatedData['lname'];
                $seller->email = $validatedData['email'];
                $seller->phone_number = $validatedData['phone'];
                $seller->description = $validatedData['description'];

                if($request->image) {
                    $this->deleteImage($seller->avatar);
                    $seller->avatar = $this->saveImage($request);
                }



                // Update address details
                $this->address->unit_number = $validatedData['unitnumber'];
                $this->address->street_number = $validatedData['street'];
                $this->address->address_line1 = $validatedData['address1'];
                $this->address->address_line2 = $validatedData['address2'];
                $this->address->postal_code = $validatedData['postalcode'];
                $this->address->city = $validatedData['city'];
                $this->address->country_code = $validatedData['country'];
                $this->address->region = $this->getRegion($validatedData['country']);

                $this->address->save();
                $seller->address_id = $this->address->id;
                $seller->save();

                DB::commit();

                return redirect()->route('seller.profile.editProfile');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Update failed: ' . $e->getMessage());
                return back()->with('error', 'Failed to update seller information.');
            }

            }

    }

    private function saveImage($request) {
        $img_name = time(). '.'. $request->image->extension();
        $request->image->storeAs(self::LOCAL_FOLDER_PATH, $img_name);

        return $img_name;
    }

    private function deleteImage($image_name) {
        $image_name = self::LOCAL_FOLDER_PATH. $image_name;

        if(Storage::disk('local')->exists($image_name)) {
            Storage::disk('local')->delete($image_name);
        }
    }

    private function getRegion($country_code) {
        $country = $this->country->where('alpha3', $country_code)->first();
        if ($country) {
            return $country->region;
        } else {
            return null;
        }
    }
}
