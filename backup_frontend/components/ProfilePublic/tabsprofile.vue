<template>
    <div>
        <!-- Tabs Profile -->
        <div class="col-md-12 col-xs-12 col-sm-12 mt-2 mb-5">
            <blockquote class="mb-5 blockquote-footer text-center">
                Tap panel navigasi dibawah untuk pindah / melihat informasi
                selanjutnya
            </blockquote>

            <ul
                class="nav nav-pills mb-5 justify-content-center"
                id="pills-tab"
                role="tablist"
            >
                <li class="nav-item" role="presentation">
                    <a
                        class="nav-link active"
                        id="pills-home-tab"
                        data-toggle="pill"
                        href="#pills-home"
                        role="tab"
                        aria-controls="pills-home"
                        aria-selected="true"
                        ><i class="fas fa-fw fa-laptop-house fa-2x"></i> Home</a
                    >
                </li>
                <li class="nav-item" role="presentation">
                    <a
                        class="nav-link"
                        id="pills-profile-tab"
                        data-toggle="pill"
                        href="#pills-profile"
                        role="tab"
                        aria-controls="pills-profile"
                        aria-selected="false"
                        ><i class="fas fa-address-card fa-fw fa-2x"></i>
                        Story</a
                    >
                </li>
                <li class="nav-item" role="presentation">
                    <a
                        class="nav-link"
                        id="pills-sponsor-tab"
                        data-toggle="pill"
                        href="#pills-sponsor"
                        role="tab"
                        aria-controls="pills-sponsor"
                        aria-selected="false"
                        ><i class="fas fa-fw fa-users fa-2x"></i> Members</a
                    >
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div
                    class="tab-pane fade show active"
                    id="pills-home"
                    role="tabpanel"
                    aria-labelledby="pills-home-tab"
                >
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-xs-12 col-sm-12">
                                <center>
                                    <ul
                                        style="list-style-type: none;"
                                        class="profile-data"
                                    >
                                        <li>
                                            <h4
                                                style="text-transform: capitalize;"
                                            >
                                                {{ profile.name }}
                                            </h4>
                                        </li>
                                        <li class="mt-2 mb-3">
                                            <b
                                                >{{ profile.city }} |
                                                {{ profile.province }}</b
                                            >
                                        </li>
                                        <div v-if="profile.status">
                                            <li>
                                                <b>Status : </b
                                                ><span
                                                    class="badge badge-success text-white"
                                                    >{{ profile.status }}</span
                                                >
                                            </li>
                                        </div>
                                    </ul>
                                </center>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6 col-xs-12 col-sm-12">
                                <center>
                                    <h4 class="text-primary mt-4">
                                        Join member {{ profile.username }} :
                                    </h4>
                                    <!-- <b-button v-b-modal.modal-1 class="btn btn-success" data-backdrop="static">Join Now</b-button> -->
                                    <a
                                        class="btn btn-success"
                                        data-toggle="modal"
                                        data-target="#joinNew"
                                        >Join Now</a
                                    >
                                    <br />
                                    
                                    <div v-if="new_member">
                                        <div class="alert alert-success mt-3">
                                            Hallo, {{ new_member }} apakah anda
                                            sudah melakukan aktivasi akun member
                                            anda ? jika sudah
                                            <b>Abaikan pesan ini !</b>
                                            <br />
                                            <!-- {{cname}} -->
                                            <a @click="deleteCookie(cname)"
                                                :href="
                                                    `https://wa.me/${profile.phone}?text=Hallo%20${profile.name}%20saya%20${new_member}%20telah%20join%20untuk%20menjadi%20member%20anda, %20bisakah%20saya%20dibantu%20untuk%20proses%20aktivasi%20akun%20member%20saya`
                                                "
                                                target="_blank"
                                                class="btn btn-primary mt-2"
                                                >Aktivasi Akun</a
                                            >
                                        </div>
                                    </div>
                                </center>
                            </div>

                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <FormJoin :profile-data="profile" />
                            </div>
                        </div>

                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-xs-12 col-sm-12">
                                <blockquote
                                    class="mb-2 blockquote-footer text-center"
                                >
                                    Selengkapnya tentang {{ profile.username }}
                                </blockquote>
                                <ul class="socials">
                                    <li>
                                        <a
                                            :href="
                                                `https://wa.me/${profile.phone}?text=Hallo%20${profile.name}%20saya%20tertarik%20untuk%20join%20Evoush, %20apa%20anda%20bisa%20bantu%20saya`
                                            "
                                            target="_blank"
                                        >
                                            <i
                                                class="fab fa-fw fa-4x fa-whatsapp text-success"
                                            ></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            :href="
                                                `https://www.facebook.com/${profile.facebook}`
                                            "
                                            target="_blank"
                                        >
                                            <i
                                                class="fab fa-fw fa-4x fa-facebook text-primary"
                                            ></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            :href="
                                                `https://www.instagram.com/${profile.instagram}`
                                            "
                                            target="_blank"
                                        >
                                            <i
                                                class="fab fa-fw fa-4x fa-instagram-square"
                                            ></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            :href="profile.youtube"
                                            target="_blank"
                                        >
                                            <i
                                                class="fab fa-fw fa-4x fa-youtube text-danger"
                                            ></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            :href="`mailto:${profile.email}`"
                                            target="_blank"
                                        >
                                            <i
                                                class="fas fa-fw fa-4x fa-envelope-open-text text-warning"
                                            ></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="tab-pane fade"
                    id="pills-profile"
                    role="tabpanel"
                    aria-labelledby="pills-profile-tab"
                >
                    <div class="container">
                        <div class="row justify-content-center">
                            <center>
                                <CardAbout :profile-data="profile" />
                            </center>
                        </div>
                    </div>
                </div>

                <div
                    class="tab-pane fade"
                    id="pills-sponsor"
                    role="tabpanel"
                    aria-labelledby="pills-sponsor-tab"
                >
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-xs-12 col-sm-12">
                                <div v-if="members.message">
                                    <div
                                        class="alert alert-danger"
                                        role="alert"
                                    >
                                        <b>{{ profile.username }}</b
                                        >, {{ members.message }}
                                    </div>
                                </div>
                                <div v-else>
                                    <MemberListActive :profile-data="profile" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Tabs Profile -->
    </div>
</template>

<script>
import CardAbout from "./cardabout";
import FormJoin from "./formjoin";
import MemberListActive from "./memberlistactive";

export default {
    components: {
        CardAbout,
        FormJoin,
        MemberListActive
    },
    props: ["profileData"],
    data() {
        return {
            profile: this.profileData[0],
            noAvatar:
                "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/profile/default.jpg",
            members: {},
            joins: {},
            loading: true,
            new_member: null,
            cname: "New Member"
        };
    },

    mounted() {
        this.getMemberJoinActive(),
        this.getMemberJoinInActive(),
        this.getCookie(this.cname)
    },

    methods: {
        getMemberJoinActive() {
            this.axios
                .get(`/api/member/join/active/${this.profile.username}`)
                .then(res => {
                    console.log(res)
                    this.members = res.data;
                })
                .catch(err => console.log(err.response))
                .finally(() => (this.loading = false))
        },

        getMemberJoinInActive() {
            this.axios
                .get(`/api/member/join/inactive/${this.profileData.username}`)
                .then(res => {
                    this.length = res.data.length;
                })
                .catch(err => console.log(err.response))
                .finally(() => (this.loading = false))
        },

        getCookie(cname) {
            let name = cname + "=";
            let ca = document.cookie.split(";");
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == " ") {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    this.new_member = c.substring(name.length, c.length);
                }
            }
            return "";
        },

        checkCookie() {
            let user = this.getCookie(this.cname);
            if (user != "") {
                alert("Welcome again " + user);
            } else {
                user = prompt("Please enter your name:", "");
                if (user != "" && user != null) {
                    setCookie("username", user, 365);
                }
            }
        },

        deleteCookie(cname) {
            var d = new Date(); //Create an date object
            d.setTime(d.getTime() - (1000*60*60*24)); //Set the time to the past. 1000 milliseonds = 1 second
            var expires = "expires=" + d.toGMTString(); //Compose the expirartion date
            window.document.cookie = cname+"="+"; "+expires;//Set the cookie with name and the expiration date
            // window.location.reload()
            this.new_member = null
        }
    }
};
</script>

<style scoped>
/*panel*/

.image--profile {
    width: 155px;
    height: 160px;
    margin-top: 5rem !important;
    display: flex;
    justify-content: center;
}

.image--profile-member {
    width: 100px;
    height: 100px;
    display: flex;
    justify-content: center;
}

.quotes {
    font-size: 16px !important;
    font-family: "Walkway";
    /*color: firebrick;*/
}
.socials {
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
    list-style: none;
    font-size: 11px !important;
    margin-left: -2rem !important;
}
.fa-instagram-square {
    color: transparent;
    background: radial-gradient(
        circle at 30% 107%,
        #fdf497 0%,
        #fdf497 5%,
        #fd5949 45%,
        #d6249f 60%,
        #285aeb 90%
    );
    background: -webkit-radial-gradient(
        circle at 30% 107%,
        #fdf497 0%,
        #fdf497 5%,
        #fd5949 45%,
        #d6249f 60%,
        #285aeb 90%
    );
    background-clip: text;
    -webkit-background-clip: text;
}
.panel-focus {
    box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
    border-radius: 12px;
    margin-top: -5rem;
    padding: 12px;
    background-color: white !important;
    /*  display: flex;
  flex-wrap: nowrap;
  align-content: justify-content-center;*/
    width: 90%;
    margin-left: 1.2rem;
}
.panel-body-focus {
    margin-top: -11rem;
    width: 100%;
    /*padding: 5px;*/
}

.list-member {
    list-style: none;
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
    margin-top: 7rem !important;
    margin-right: 1.5rem !important;
}
/*end panel;*/

label {
    text-align: left;
}
.modal-body-member {
    text-align: left !important;
}

/*button*/
.btn-hover {
    width: 100%;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    margin: 20px;
    height: 35px;
    text-align: center;
    border: none;
    background-size: 300% 100%;

    border-radius: 50px;
    moz-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
    -webkit-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
}

.btn-hover:hover {
    background-position: 100% 0;
    moz-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
    -webkit-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
}

.btn-hover:focus {
    outline: none;
}
.btn-hover.color-1 {
    background-image: linear-gradient(
        to right,
        #25aae1,
        #40e495,
        #30dd8a,
        #2bb673
    );
    box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);
}
.btn-hover.color-4 {
    background-image: linear-gradient(
        to right,
        #fc6076,
        #ff9a44,
        #ef9d43,
        #e75516
    );
    box-shadow: 0 4px 15px 0 rgba(252, 104, 110, 0.75);
}

/*end button*/
/* DESKTOP VERSION */
@media (min-width: 992px) {
    .profile-content {
    }
    .image--profile {
        width: 155px;
        height: 160px;
        margin-top: -10rem !important;
        display: flex;
        justify-content: center;
    }
    .image--profile-member {
        width: 100px;
        height: 100px;
        display: flex;
        justify-content: center;
    }
    .profile-data h1 {
    }
    .quotes {
        width: 40% !important;
        font-size: 18px !important;
        font-family: "Walkway";
        /*color: firebrick;*/
    }
    .socials {
        display: flex;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: center;
        list-style: none;
    }
    .fa-instagram-square {
        color: transparent;
        background: radial-gradient(
            circle at 30% 107%,
            #fdf497 0%,
            #fdf497 5%,
            #fd5949 45%,
            #d6249f 60%,
            #285aeb 90%
        );
        background: -webkit-radial-gradient(
            circle at 30% 107%,
            #fdf497 0%,
            #fdf497 5%,
            #fd5949 45%,
            #d6249f 60%,
            #285aeb 90%
        );
        background-clip: text;
        -webkit-background-clip: text;
    }

    /*panel*/
    .panel-focus {
        box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
        border-radius: 12px;
        margin-top: -8rem;
        /*padding: 12px;*/
        background-color: white;
        margin-left: 3.5rem;
        width: 90%;
        /*height: 50vh;*/
    }
    .panel-body-focus {
        margin-top: 5rem;
        /*padding: 15px;*/
    }

    .panel-body-focus p {
        font-size: 18px;
        font-weight: 400;
        text-align: justify;
    }

    .list-member {
        list-style: none;
        display: flex;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: center;
        margin-top: 10rem !important;
        margin-right: 3rem !important;
    }

    label {
        text-align: left !important;
    }

    .modal-body-member {
        text-align: left !important;
    }
}
</style>
