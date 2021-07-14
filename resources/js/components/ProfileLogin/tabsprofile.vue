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
                                <ActivateNewMember :profile-data="profile" />
                            </div>
                        </div>

                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-xs-12 col-sm-12">
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
import ActivateNewMember from "./activatenewmember";
import MemberListActive from "./memberlistactive";

export default {
    components: {
        CardAbout,
        ActivateNewMember,
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
            loading: true
        };
    },

    mounted() {
        this.getMemberJoinActive(), 
        this.getMemberJoinInActive()
    },

    methods: {
        // checkRoles(){
        // 	const check = this.roles.includes("MEMBER")
        // 	if(check){
        // 		this.role = "MEMBER"
        // 	}else{
        // 		this.role = "FOLLOWER"
        // 	}
        // },

        getMemberJoinActive() {
            this.axios
                .get(`/api/member/join/active/${this.profileData[0].username}`)
                .then(res => {
                    this.members = res.data;
                })
                .catch(err => console.log(err.response))
                .finally(() => (this.loading = false))
        },

        getMemberJoinInActive() {
            this.axios
                .get(
                    `/api/member/join/inactive/${this.profileData[0].username}`
                )
                .then(res => {
                    this.joins = res.data;
                })
                .catch(err => console.log(err.response))
                .finally(() => (this.loading = false))
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
