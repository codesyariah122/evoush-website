<!-- Modal -->
<div class="modal fade" id="newMemberJoin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Join Member Baru <blockquote class="blockquote-footer">
              Sponsor : @{{name}}
            </blockquote> 
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body modal-body-member">
          <blockquote class="blockquote-footer mt-2 mb-3">
            Silahkan di isi form input dibawah untuk melakukan proses join member evoush. <br>
            <small class="text-danger">*Semua field di form input di bawah wajib di isi</small>
          </blockquote>

          <form @submit.prevent="storeNewMember">

            <input type="hidden" name="sponsor_id" :value="profile.id" id="sponsor_id">
            <input type="hidden" name="roles[]" value="FOLLOWER" id="roles">
            <input type="hidden" name="status" value="INACTIVE" id="status">
            <input type="hidden" name="username_path" value="profile.username" id="username_path">

            <div class="form-group">
              <label for="name">Name</label>
              <input
              class="form-control" placeholder="Format : nama lengkap" type="text"
              name="name" id="name"/>
              <small class="text-danger">*wajib di isi</small>
              <br>
            </div>

            <div class="form-group">
             <label for="email">Email</label>
             <input
             class="form-control"
             placeholder="Format : user@alamatemail.com (gunakan email aktif anda)"
             type="text"
             name="email"
             id="email"/>
             <small class="text-danger">*wajib di isi</small>
            <br>
          </div>

          <div class="form-group">
            <label for="phone">Phone number</label>
            <br>
            <input
            type="number"
            name="phone"
            placeholder="format: 6282xxxxxxxxx (max: 13digit)"
            class="form-control" id="phone">
            <small class="text-danger">*wajib di isi</small>
            <br>
          </div>



          <div class="form-group">
            <label for="province">Province</label>
            <select name="province" class="form-control" v-on:change="getCity" id="province">
              <option value="" data-id="">Choose Province</option>
              <option v-for="provins in provinces.provinsi" v-bind:value="provins.id" :value="provins.id" :data-id="provins.id">@{{provins.nama}}</option>
            </select>
            <small class="text-danger">*wajib di pilih salah satu</small>
          </div>
          <br>

          <div class="form-group">
            <label for="city">City</label>
            <select name="city" class="form-control" id="city">
              <option value="">Choose City</option>
              <option v-for="city in citys.kota_kabupaten" :key="city.id" :value="city.nama">@{{city.nama}}</option>
            </select>
            <small class="text-danger">*wajib di pilih salah satu</small>
          </div>
          <br>

          <div class="form-group">
            <label for="password">Password</label>
            <input
            class="form-control"
            placeholder="password"
            type="password"
            name="password"
            id="password"/>
            <small class="text-danger">*wajib di isi</small>
            <br>
            <div id="show-password" class="show" v-on:click="showPassword">
              <div v-if="showing === false">
                <span v-html="show"></span> Show
              </div>
              <div v-else>
                <span v-html="hide"></span> Hide
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input
            class="form-control"
            placeholder="password confirmation"
            type="password"
            name="password_confirmation"
            id="password_confirmation"/>
            <small class="text-danger">*Samakan dengan password diatas</small>
            <br>
            <div id="show-password" class="show" v-on:click="showPasswordConfirm">
              <div v-if="showingConfirm === false">
                <span v-html="show"></span> Show
              </div>
              <div v-else>
                <span v-html="hide"></span> Hide
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Join Member</button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>