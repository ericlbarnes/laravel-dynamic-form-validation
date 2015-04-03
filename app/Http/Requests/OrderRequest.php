<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrderRequest extends Request {

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    $rules = [
      'name' => 'required|max:255',
    ];

    foreach($this->request->get('items') as $key => $val)
    {
      $rules['items.'.$key] = 'required|max:10';
    }

    return $rules;
  }

  public function messages()
  {
    $messages = [];
    foreach($this->request->get('items') as $key => $val)
    {
      $messages['items.'.$key.'.max'] = 'The field labeled "Book Title '.$key.'" must be less than :max characters.';
    }
    return $messages;
  }

}
