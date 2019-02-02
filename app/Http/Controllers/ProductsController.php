<?php
namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductsAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

class ProductsController extends Controller
{
    public function addProduct(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>";
            // print_r($data);die;
            if (empty($data['category_id'])) {
                return redirect()->back()->with('flash_message_error', 'Under Category is missing!');
            }
            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            if (!empty($data['description'])) {
                $product->description = $data['description'];
            } else {
                $product->description = '';
            }
            $product->price = $data['price'];
            // Upload Image
            if ($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    while (true) {
                        $filename = substr(sha1(mt_rand()), 9, 19) . '.png'; //.$extension;
                        if (empty(Product::where(['image' => $filename])->first())) {
                            break;
                        }
                    }
                    $large_image_path = 'images/backend_images/products/large/' . $filename;
                    $medium_image_path = 'images/backend_images/products/medium/' . $filename;
                    $small_image_path = 'images/backend_images/products/small/' . $filename;
                    // Resize Images
                    Image::make($image_tmp)->resize(1200, 1200, function ($constraint) {$constraint->aspectRatio();})->resizeCanvas(1200, 1200)->encode('png')->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600, function ($constraint) {$constraint->aspectRatio();})->resizeCanvas(600, 600)->encode('png')->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->resizeCanvas(300, 300)->encode('png')->save($small_image_path);
                    // Store image name in products table
                    $product->image = $filename;
                }
            }
            $product->save();
            /*return redirect()->back()->with('flash_message_success','Product has been added successfully!');*/
            return redirect('/admin/view-products')->with('flash_message_success', 'Product has been added successfully!');
        }
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach ($categories as $cat) {
            $categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name . "</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value = '" . $sub_cat->id . "'>&nbsp;--&nbsp;" . $sub_cat->name . "</option>";
            }
        }
        return view('admin.products.add_product')->with(compact('categories_dropdown'));
    }

    public function viewProducts()
    {
        $products = Product::get();
        // echo "<pre>"; print_r($products);
        $products = json_decode(json_encode($products));
        foreach ($products as $key => $val) {
            $category_name = Category::where(['id' => $val->category_id])->first();
            $products[$key]->category_name = $category_name->name;
        }
        // echo "<pre>"; print_r($products); die;
        return view('admin.products.view_products')->with(compact('products'));
    }

    public function editProduct(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $product = Product::where(['id' => $id])->first();
            // echo "<pre>"; print_r($data); die;
            // Upload Image

            if ($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    if (!empty($product->image)) {
                        $filename = $product->image;
                        $large_image_path = 'images/backend_images/products/large/' . $filename;
                        $medium_image_path = 'images/backend_images/products/medium/' . $filename;
                        $small_image_path = 'images/backend_images/products/small/' . $filename;
                        // Unlink Images
                        unlink($large_image_path);
                        unlink($medium_image_path);
                        unlink($small_image_path);
                    }
                    $extension = $image_tmp->getClientOriginalExtension();
                    while (true) {
                        $filename = substr(sha1(mt_rand()), 9, 19) . '.png'; //. $extension;
                        if (empty(Product::where(['image' => $filename])->first())) {
                            break;
                        }
                    }
                    $large_image_path = 'images/backend_images/products/large/' . $filename;
                    $medium_image_path = 'images/backend_images/products/medium/' . $filename;
                    $small_image_path = 'images/backend_images/products/small/' . $filename;
                    // Resize Images
                    Image::make($image_tmp)->resize(1200, 1200, function ($constraint) {$constraint->aspectRatio();})->resizeCanvas(1200, 1200)->encode('png')->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600, function ($constraint) {$constraint->aspectRatio();})->resizeCanvas(600, 600)->encode('png')->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->resizeCanvas(300, 300)->encode('png')->save($small_image_path);
                    // Store image name in products table

                } else {
                    $filename = $data['current_image'];

                }
            }
            if (empty($data['category_id'])) {
                return redirect()->back()->with('flash_message_error', 'Under Category is missing!');
            }
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            if (!empty($data['description'])) {
                $product->description = $data['description'];
            } else {
                $product->description = '';
            }
            $product->price = $data['price'];
            $product->image = $filename;
            $product->update();
            /*return redirect()->back()->with('flash_message_success','Product has been added successfully!');*/
            return redirect('/admin/view-products')->with('flash_message_success', 'Product has been edited successfully!');
        }
        $product = Product::where(['id' => $id])->first();
        // echo "<pre>"; print_r($product);

        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach ($categories as $cat) {
            if ($cat->id == $product->category_id) {
                $selected = " selected";
            } else {
                $selected = "";
            }
            $categories_dropdown .= "<option value='" . $cat->id . "'" . $selected . ">" . $cat->name . "</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                if ($sub_cat->id == $product->category_id) {
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                $categories_dropdown .= "<option value = '" . $sub_cat->id . "'" . $selected . ">&nbsp;--&nbsp;" . $sub_cat->name . "</option>";
            }
        }

        // echo "<pre>"; print_r($product); die;
        return view('admin.products.edit_product')->with(compact('categories_dropdown', 'product'));
    }

    public function deleteProductImage($id)
    {
        $product = Product::where(['id' => $id])->first();
        $filename = $product->image;
        $large_image_path = 'images/backend_images/products/large/' . $filename;
        $medium_image_path = 'images/backend_images/products/medium/' . $filename;
        $small_image_path = 'images/backend_images/products/small/' . $filename;
        // Unlink Images
        unlink($large_image_path);
        unlink($medium_image_path);
        unlink($small_image_path);
        $product->image = '';
        $product->update();
        return redirect()->back()->with('flash_message_success', 'Image has been deleted successfully!');
    }

    public function deleteProduct($id)
    {
        $product = Product::where(['id' => $id])->first();
        $filename = $product->image;
        $large_image_path = 'images/backend_images/products/large/' . $filename;
        $medium_image_path = 'images/backend_images/products/medium/' . $filename;
        $small_image_path = 'images/backend_images/products/small/' . $filename;
        // Unlink Images
        unlink($large_image_path);
        unlink($medium_image_path);
        unlink($small_image_path);
        $product->delete();

        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully!');
    }

    public function addAttributes(Request $request, $id = null)
    {
        $productDetails = Product::where(['id' => $id])->first();
        if ($request->isMethod('post')) {
            $productDetails = Product::with('attributes')->where(['id' => $id])->first();
            $code = $productDetails->product_code . '-';
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            foreach ($data['sku'] as $key => $val) {
                // echo "<pre>";print_r($code);die;
                if (!empty($val)) {
                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $code . $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                }
            }
        }
        return view('admin.products.add_attributes')->with(compact('productDetails'));
    }

    public function deleteAttributes($id = null)
    {
        if (!empty($id)) {
            //echo "<pre>"; print_r($data); die;
            ProductsAttribute::where(['id' => $id])->delete();
            return redirect()->back()->with('flash_message_success', 'Attribute deleted Successfully!');
        }
    }

    public function products($url = null)
    {
        $categoryDetails = Category::where(['url' => $url])->first();
        $productsAll = Product::where(['category_id' => $categoryDetails->id])->get();
        return view('products.listing')->with(compact('categorDetails', 'productsAll'))
    }
}
