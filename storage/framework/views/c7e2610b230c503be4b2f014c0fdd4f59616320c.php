
<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="edit-profile">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-12 col-xs-12 col-sm-12">

              <a href="<?php echo e(route('profile.index')); ?>" class="btn btn-sm btn-success mt-2 mb-3">Profile List</a>

              <div class="card">
                  <div class="card-header"><?php echo e($title); ?></div>
                  <div class="card-body">
                  	<div class="col-md-8">
                  		<?php if(session('status')): ?>
                  		<div class="alert alert-success">
                  			<?php echo e(session('status')); ?>

                  		</div>
                  		<?php endif; ?>

                      
                      
                  		<form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
                          action="<?php echo e(route('profile.update', [$profile->id])); ?>" method="POST">
                          <?php echo csrf_field(); ?>
                        <input type="hidden" value="PUT" name="_method">

                        <div class="form-group">
                          <label for="nama">Fullname</label>
                          <input type="text" name="name" id="name" value="<?php echo e(old('name') ? old('name') : $profile->name); ?>" class="form-control <?php echo e($errors->first('name') ? "is-invalid" : ""); ?>">

                          <div class="invalid-feedback">
                            <?php echo e($errors->first('name')); ?>

                          </div>
                        </div>
                        <br>

                        <div class="form-group">
                           <label for="avatar">Profile Cover</label>
                           <br>
                           Current Picture: <br>
                           <?php if($profile->avatar): ?>
                           <img src="<?php echo e(asset('storage/'.$profile->avatar)); ?>" width="120px" />
                           <br>
                           <?php else: ?>
                           <small class="text-danger">No Picture</small>
                           <?php endif; ?>
                           <br>
                           <input id="avatar" name="avatar" id="avatar" type="file" class="form-control">
                           <small class="text-muted">Kosongkan jika tidak ingin mengubah
                           profile picture</small>
                           <hr class="my-4">
                        </div>

                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" name="username" id="username" value="<?php echo e(old('username') ? old('username') : $profile->username); ?>" class="form-control <?php echo e($errors->first('username') ? "is-invalid" : ""); ?>" 
                          <?php echo e((in_array('ADMIN', json_decode(Auth::user()->roles))) ? '' : 'disabled'); ?>

                          >

                          <div class="invalid-feedback">
                            <?php echo e($errors->first('username')); ?>

                          </div>
                        </div>
                        <br>


                        <input type="hidden" name="roles[]" value="<?php echo e(in_array('ADMIN', json_decode(Auth::user()->roles)) ? "ADMIN" : ""); ?>">

                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" name="email" id="email" value="<?php echo e(old('email') ? old('email') : $profile->email); ?>" class="form-control <?php echo e($errors->first('email') ? "is-invalid" : ""); ?>">

                          <div class="invalid-feedback">
                            <?php echo e($errors->first('email')); ?>

                          </div>
                        </div>
                        <br>

                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control <?php echo e($errors->first('address') ? "is-invalid" : ""); ?>"><?php echo e(old('address') ?
                        old('address') : $profile->address); ?></textarea>
                        <div class="invalid-feedback">
                         <?php echo e($errors->first('address')); ?>

                       </div>
                       <br>

                        <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="number" name="phone" id="phone" value="<?php echo e(old('phone') ? old('phone') : $profile->phone); ?>" class="form-control <?php echo e($errors->first('phone') ? "is-invalid" : ""); ?>">

                          <div class="invalid-feedback">
                            <?php echo e($errors->first('phone')); ?>

                          </div>
                        </div>
                        <br>

                        <hr class="my-4">
                        
                        <div class="form-group">
                         <label for="quotes">Quotes</label>
                         <textarea name="quotes" id="quotes" class="form-control <?php echo e($errors->first('quotes') ? "is-invalid" : ""); ?>"><?php echo e(old('quotes') ?
                         old('quotes') : $profile->quotes); ?></textarea>
                         <div class="invalid-feedback">
                           <?php echo e($errors->first('quotes')); ?>

                         </div>
                         <br>
                       </div>

                       <div class="form-group">
                         <label for="cover">Profile Cover</label>
                         <br>
                         Current Cover: <br>
                         <?php if($profile->cover): ?>
                         <img src="<?php echo e(asset('storage/'.$profile->cover)); ?>" width="120px" />
                         <br>
                         <?php else: ?>
                         <small class="text-danger">No Cover</small>
                         <?php endif; ?>
                         <br>
                         <input id="cover" name="cover" type="file" class="form-control">
                         <small class="text-muted">Kosongkan jika tidak ingin mengubah
                         cover</small>
                         <hr class="my-4">
                       </div>

                       <div class="form-group">
                         <label for="about">About</label>
                         <textarea name="about" id="about" class="form-control <?php echo e($errors->first('about') ? "is-invalid" : ""); ?>"><?php echo e(old('about') ?
                            old('about') : $profile->about); ?></textarea>
                            <div class="invalid-feedback">
                             <?php echo e($errors->first('about')); ?>

                         </div>
                       </div>
                       <br>

                       <div class="form-group">
                         <label for="facebook">Facebook</label>
                          <input value="<?php echo e(old('facebook') ? old('facebook') : $profile->facebook); ?>"
                            class="form-control <?php echo e($errors->first('facebook') ? "is-invalid" : ""); ?>"
                            placeholder="Username Facebook" type="text" name="facebook" id="facebook"/>
                          <div class="invalid-feedback">
                            <?php echo e($errors->first('facebook')); ?>

                          </div>
                       </div>
                        <br>

                        <div class="form-group">
                          <label for="instagram">Instagram</label>
                          <input value="<?php echo e(old('instagram') ? old('instagram') : $profile->instagram); ?>"
                            class="form-control <?php echo e($errors->first('instagram') ? "is-invalid" : ""); ?>"
                            placeholder="Username Instagram" type="text" name="instagram" id="instagram"/>
                          <div class="invalid-feedback">
                            <?php echo e($errors->first('instagram')); ?>

                          </div>
                        </div>
                        <br>

                        <div class="form-group">
                          <label for="youtube">Youtube</label>
                          <input value="<?php echo e(old('youtube') ? old('youtube') : $profile->youtube); ?>"
                            class="form-control <?php echo e($errors->first('youtube') ? "is-invalid" : ""); ?>"
                            placeholder="https://www.youtube.com/channel/UCxptCTRqJ5amS9nmztsG7jw" type="text" name="youtube" id="youtube"/>
                          <div class="invalid-feedback">
                            <?php echo e($errors->first('youtube')); ?>

                          </div>
                        </div>
                        <br>

                       <div class="form-group">
                        <label for="province">Province</label>
                        
                        
                          <select name="province"  class="form-control" id="province" v-on:change="getCity">
                            <option value="<?php echo e($profile->province); ?>"><?php echo e($profile->province); ?></option>
                            <option value="" data-id="">Choose Province</option>
                            <option v-for="provins in provinces" v-bind:value="provins.id" :value="provins.id" :data-id="provins.id" id="province">{{provins.nama}}</option>
                          </select>
                        
                      </div>
                      <br>

                      <div class="form-group">
                        <label for="city">City</label>
                        
                          <select name="city" class="form-control" id="city">
                            <option value="<?php echo e($profile->city); ?>"><?php echo e($profile->city); ?></option>
                            <option v-if="citys" v-for="city in citys.kota_kabupaten" :key="city.id" :value="city.nama">{{city.nama}}</option>
                          </select>

                      </div>
                      <br>

                      <div class="form-group">
                        <label for="parallax">Parallax Profile</label>
                         <br>
                         Current Parallax: <br>
                         <?php if($profile->parallax): ?>
                         <img src="<?php echo e(asset('storage/'.$profile->parallax)); ?>" width="120px" />
                         <br>
                         <?php else: ?>
                         <small class="text-danger">No Parallax Image</small>
                         <?php endif; ?>
                         <br>
                         <input id="parallax" name="parallax" type="file" class="form-control">
                         <small class="text-muted">Kosongkan jika tidak ingin mengubah
                         Parallax Image</small>
                         <hr class="my-4">
                      </div>
                       <br>

                       <input class="btn btn-primary" type="submit" value="Simpan"/>
                      
                      </form>

                  	</div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
</div>
 
 <script type="text/javascript">
   new Vue({
    el:'#edit-profile',
      data(){
        return {
          provinces: [],
          citys: []
        }
      },

      mounted(){
        this.getProvinsi()
      },

      methods: {
        getProvinsi(){
          axios.get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')
          .then(res => {
            this.provinces = res.data.provinsi
            console.log(this.provinces)      
          })
        },

        getCity(e){
          const id = e.target.value
          axios.get(`https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${id}`)
          .then(res => {
            this.citys = res.data
          })
        }
      }

   })
 </script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\_backup\evoush-website\resources\views/dashboard/profile/edit.blade.php ENDPATH**/ ?>