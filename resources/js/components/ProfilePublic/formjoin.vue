<template>
    <div>
        <!-- Modal -->
        <div
            class="modal fade"
            id="joinNew"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Join Member Baru Sponsor :
                            <span style="text-transform: capitalize;">{{
                                profile.name
                            }}</span>
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body modal-body-member">
                        <div v-if="showing_axios && !error">
                            <div v-if="messages">
                                <div class="alert alert-success">
                                    {{ messages }}
                                    <br />
                                    <a @click="deleteCookie('New Member')"
                                        :href="
                                            `https://wa.me/${profile.phone}?text=Hallo%20${profile.name}%20saya%20${name_join}%20telah%20join%20untuk%20menjadi%20member%20anda, %20bisakah%20saya%20dibantu%20untuk%20proses%20aktivasi%20akun%20member%20saya`
                                        "
                                        target="_blank"
                                        class="btn btn-primary mt-2"
                                        >Aktivasi Akun</a
                                    >
                                </div>
                            </div>
                        </div>

                        <blockquote class="blockquote-footer mt-2 mb-3">
                            Silahkan di isi form input dibawah untuk melakukan
                            proses join member evoush. <br />
                            <small class="text-danger"
                                >*Semua field di form input di bawah wajib di
                                isi</small
                            >
                        </blockquote>

                        <form @submit.prevent="storeNewMember">
                            <input
                                type="hidden"
                                name="sponsor_id"
                                :value="profile.id"
                                id="sponsor_id"
                            />
                            <input
                                type="hidden"
                                name="roles[]"
                                value="FOLLOWER"
                                id="roles"
                            />
                            <input
                                type="hidden"
                                name="status"
                                value="INACTIVE"
                                id="status"
                            />
                            <input
                                type="hidden"
                                name="username_path"
                                :value="profile.username"
                                id="username_path"
                            />

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input
                                    class="form-control"
                                    placeholder="Format : nama lengkap"
                                    type="text"
                                    name="name"
                                    id="name"
                                />
                                <small class="text-danger">*wajib di isi</small>
                                <br />
                                <div v-if="showing_axios">
                                    <div v-if="error">
                                        <div class="alert alert-danger">
                                            <blockquote
                                                class="blockquote-footer"
                                            >
                                                <b class="text-primary">{{
                                                    err_msg
                                                }}</b>
                                            </blockquote>
                                            <br />
                                            <span>{{ messages.name }}</span
                                            ><br />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    class="form-control"
                                    placeholder="Format : user@alamatemail.com (gunakan email aktif anda)"
                                    type="text"
                                    name="email"
                                    id="email"
                                />
                                <small class="text-danger">*wajib di isi</small>
                                <br />
                                <div v-if="showing_axios">
                                    <div v-if="error">
                                        <div class="alert alert-danger">
                                            <blockquote
                                                class="blockquote-footer"
                                            >
                                                <b class="text-primary">{{
                                                    err_msg
                                                }}</b>
                                            </blockquote>
                                            <br />
                                            <span>{{ messages.email }}</span
                                            ><br />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone number</label>
                                <br />
                                <input
                                    type="number"
                                    name="phone"
                                    placeholder="format: 6282xxxxxxxxx (max: 13digit)"
                                    class="form-control"
                                    id="phone"
                                />
                                <small class="text-danger">*wajib di isi</small>
                                <br />
                                <div v-if="showing_axios">
                                    <div v-if="error">
                                        <div class="alert alert-danger">
                                            <blockquote
                                                class="blockquote-footer"
                                            >
                                                <b class="text-primary">{{
                                                    err_msg
                                                }}</b>
                                            </blockquote>
                                            <br />
                                            <span>{{ messages.phone }}</span
                                            ><br />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="province">Province</label>
                                <select
                                    name="province"
                                    class="form-control"
                                    v-on:change="getCity"
                                    id="province"
                                >
                                    <option value="" data-id=""
                                        >Choose Province</option
                                    >
                                    <option
                                        v-for="provins in provinces.provinsi"
                                        v-bind:value="provins.id"
                                        :value="provins.id"
                                        :data-id="provins.id"
                                        >{{ provins.nama }}</option
                                    >
                                </select>
                                <small class="text-danger"
                                    >*wajib di pilih salah satu</small
                                >
                            </div>
                            <br />

                            <div class="form-group">
                                <label for="city">City</label>
                                <select
                                    name="city"
                                    class="form-control"
                                    id="city"
                                >
                                    <option value="">Choose City</option>
                                    <option
                                        v-for="city in citys.kota_kabupaten"
                                        :key="city.id"
                                        :value="city.nama"
                                        >{{ city.nama }}</option
                                    >
                                </select>
                                <small class="text-danger"
                                    >*wajib di pilih salah satu</small
                                >
                            </div>
                            <br />

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input
                                    class="form-control"
                                    placeholder="password"
                                    type="password"
                                    name="password"
                                    id="password"
                                />
                                <small class="text-danger">*wajib di isi</small>
                                <br />
                                <div v-if="showing_axios">
                                    <div v-if="error">
                                        <div class="alert alert-danger">
                                            <blockquote
                                                class="blockquote-footer"
                                            >
                                                <b class="text-primary">{{
                                                    err_msg
                                                }}</b>
                                            </blockquote>
                                            <br />
                                            <span>{{ messages.password }}</span
                                            ><br />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    id="show-password"
                                    class="show"
                                    v-on:click="showPassword"
                                >
                                    <div v-if="showing === false">
                                        <span v-html="show"></span> Show
                                    </div>
                                    <div v-else>
                                        <span v-html="hide"></span> Hide
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation"
                                    >Password Confirmation</label
                                >
                                <input
                                    class="form-control"
                                    placeholder="password confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                />
                                <small class="text-danger"
                                    >*Samakan dengan password diatas</small
                                >
                                <br />
                                <div v-if="showing_axios">
                                    <div v-if="error">
                                        <div class="alert alert-danger">
                                            <blockquote
                                                class="blockquote-footer"
                                            >
                                                <b class="text-primary">{{
                                                    err_msg
                                                }}</b>
                                            </blockquote>
                                            <br />
                                            <span>{{
                                                messages.password_confirmation
                                            }}</span
                                            ><br />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    id="show-password"
                                    class="show"
                                    v-on:click="showPasswordConfirm"
                                >
                                    <div v-if="showingConfirm === false">
                                        <span v-html="show"></span> Show
                                    </div>
                                    <div v-else>
                                        <span v-html="hide"></span> Hide
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Join Member
                            </button>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["profileData"],
    data() {
        return {
            provinces: [],
            citys: [],
            showing: false,
            showingConfirm: false,
            show: `<i class="fas fa-fw fa-eye"></i>`,
            hide: `<i class="fas fa-low-vision"></i>`,
            error: false,
            name_join: "",
            showing_axios: false,
            success: false,
            field: {},
            messages: {},
            err_msg: "",
            profile: this.profileData
        };
    },

    mounted() {
        this.getProvinsi()
    },

    methods: {
        storeNewMember() {
            const password = document.querySelector("#password").value;
            const confirm_password = document.querySelector(
                "#password_confirmation"
            ).value;

            if (password !== confirm_password) {
                this.getAlert(
                    "Password konfirmasi tidak sama",
                    "https://media0.giphy.com/media/utmZFnsMhUHqU/200.gif"
                );
            } else {
                this.field = {
                    sponsor_id: document.querySelector("#sponsor_id").value,
                    roles: document.querySelector("#roles").value,
                    status: document.querySelector("#status").value,
                    user_path: document.querySelector("#username_path").value,
                    name: document.querySelector("#name").value,
                    email: document.querySelector("#email").value,
                    phone: document.querySelector("#phone").value,
                    province: document.querySelector("#province").value,
                    city: document.querySelector("#city").value,
                    password: password,
                    password_confirmation: confirm_password
                };
                axios
                    .post("/api/member/new-join", this.field)
                    .then(res => {
                        this.getAlert(
                            res.data.message,
                            "https://media1.tenor.com/images/808f60557342d540771c340e0a387247/tenor.gif?itemid=9727038"
                        );
                        this.messages = res.data.message;
                        this.showing_axios = true;
                        this.error = false;
                        this.name_join = this.field.name;

                        this.setCookie("New Member", this.name_join, 7);
                    })
                    .catch(err => {
                        console.log(err.response.data);
                        this.getAlert(
                            err.response.data.message,
                            "https://media0.giphy.com/media/utmZFnsMhUHqU/200.gif"
                        );
                        this.messages = err.response.data.errors;
                        this.err_msg = err.response.data.message;
                        this.showing_axios = true;
                        this.success = false;
                        this.error = true;
                        this.showModal();
                    })
                    .finally(() => {
                        this.success = true;
                        this.hideModal();
                    });
            }
        },

        getAlert(message, gif, bg) {
            Swal.fire({
                title: message,
                width: 600,
                padding: "3em",
                background: `#fff url(${bg})`,
                backdrop: `
        rgba(0,0,123,0.4)
        url("${gif}")
        left top
        no-repeat
        `
            });
        },

        getProvinsi() {
            axios
                .get("https://dev.farizdotid.com/api/daerahindonesia/provinsi")
                .then(res => {
                    this.provinces = res.data;
                });
        },

        getCity(e) {
            const id = e.target.value;
            axios
                .get(
                    `https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${id}`
                )
                .then(res => {
                    this.citys = res.data;
                });
        },

        showPassword() {
            const password = document.querySelector("#password");
            if (password.type === "password") {
                password.type = "text";
                this.showing = true;
            } else {
                password.type = "password";
                this.showing = false;
            }
        },

        showPasswordConfirm() {
            const password = document.querySelector("#password_confirmation");
            if (password.type === "password") {
                password.type = "text";
                this.showingConfirm = true;
            } else {
                password.type = "password";
                this.showingConfirm = false;
            }
        },

        showModal() {
            $("#joinNew").modal({
                show: true
            });
        },

        hideModal() {
            $("#joinNew").modal({
                show: false
            });
        },

        setCookie(cname, cvalue, exdays) {
            const d = new Date();
            d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
            let expires = "expires=" + d.toGMTString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        },

        deleteCookie(cname) {
            var d = new Date(); //Create an date object
            d.setTime(d.getTime() - (1000*60*60*24)); //Set the time to the past. 1000 milliseonds = 1 second
            var expires = "expires=" + d.toGMTString(); //Compose the expirartion date
            window.document.cookie = cname+"="+"; "+expires;//Set the cookie with name and the expiration date
            // window.location.reload()
            this.hideModal()
            this.new_member = null
        }
    }
};
</script>

<style scoped></style>