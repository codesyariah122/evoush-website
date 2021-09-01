<div id="form-with-tinytext">
    <form class="bg-white shadow-sm p-4 mt-5"
    action="{{route('contactpage.store')}}" method="POST">
    @csrf
    {{-- Ip Location --}}
    <input type="hidden" name="country" :value="country">
    <input type="hidden" name="city" :value="city">
    <input type="hidden" name="ip_address" :value="ip">

    <div class="form-group">
      <label for="name">Name</label>
      <input value="{{old('name')}}" class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Your Full Name" type="text"
      name="name" id="name"/>
      <div class="invalid-feedback">
       {{$errors->first('name')}}
     </div>
   </div>

   <div class="form-group">
    <label for="email">Email</label>
    <input value="{{old('email')}}" class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" placeholder="your_active_email@email.com"
    type="text" name="email" id="email"/>
    <div class="invalid-feedback">
     {{$errors->first('email')}}
   </div>
  </div>

  <div class="form-group">
    <label for="phone">Phone number</label>
    <div class="d-flex">
      <img :src="flag">
      <select name="code" style="width: 85px; text-align: center; font-weight: 900;margin-right: .5rem; margin-left: .3rem;">
        <option :value="codeNumber">@{{codeNumber}}</option>
      </select>
      {{-- <input type="disabled" :value="codeNumber" name="code" style="width: 35px; text-align: center; font-weight:900;" class="mr-2" class="form-control"> --}}
      <input value="{{old('phone')}}" type="number" name="phone" class="form-control {{$errors->first('phone') ? "is-invalid" : ""}}" placeholder="Your Phone Number"> 
    </div>
    <div class="invalid-feedback">
     {{$errors->first('phone')}}
   </div>
  </div>

  <div class="form-group">
    <label for="categorymessage">Category Message</label><br>
    <select
    name="category_id"
    id="categorymessage"
    class="form-control {{$errors->first('category_id') ? "is-invalid" : ""}} ">
    <option v-for="category in categorys" :value="category.id">@{{category.category_name}}</option>
  </select>

  <div class="invalid-feedback">
   {{$errors->first('category_id')}}
  </div>
  </div>

  <div class="form-group mb-5">
    <label for="full-featured-non-premium">Message </label>
    <textarea id="full-featured-non-premium" class="form-controll {{$errors->first('message') ? "is-invald" : ""}}" value="{{old('message')}}" name="message"></textarea>
  </div>

  <button type="submit" class="btn btn-block btn-primary">Send Message</button>
  </form>
</div>
