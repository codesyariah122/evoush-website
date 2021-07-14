<template>
    <div>
        <div v-if="loading">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xs-12 col-sm-12">
                        <center>
                            <img
                                src="https://motiongraphicsphoebe.files.wordpress.com/2018/10/8ee212dac057d412972e0c8cc164deee.gif?w=545&h=409"
                                class="img-responsive"
                            />
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <div class="row justify-content-center">
                <div v-for="member in members" class="col-md-4">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <div v-if="member.avatar">
                                    <img
                                        :src="`../../../${member.avatar}`"
                                        :alt="member.name"
                                        class="image--profile-member img-responsive rounded-circle center-block d-block mx-auto mt-2"
                                    />
                                </div>
                                <div v-else>
                                    <img
                                        :src="noAvatar"
                                        :alt="member.name"
                                        class="image--profile-member img-responsive rounded-circle center-block d-block mx-auto mt-2"
                                    />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a
                                            :href="`/member/${member.username}`"
                                            >{{ member.name }}</a
                                        >
                                    </h5>
                                    <br>
                                    <div v-if="profile.status">
                                        <b>Status : </b
                                            ><span
                                            class="badge badge-success text-white"
                                            >{{ profile.status }}</span
                                            >
                                        </div>

                                    <blockquote class="blockquote-footer">
                                        {{ member.city }} |
                                        {{ member.province }}
                                    </blockquote>

                                    <p class="card-text ml-2">
                                        Join pada : <br>
                                        <small class="text-muted">{{created}}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
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
            profile: this.profileData,
            noAvatar:
                "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/profile/default.jpg",
            loading: true,
            members: [],
            created: ''
        };
    },

    mounted() {
        this.getMemberJoinActive()
    },

    methods: {
        getMemberJoinActive() {
            this.axios
                .get(`/api/member/join/active/${this.profileData.username}`)
                .then(res => {
                    this.members = res.data;
                     res.data.map(d => {
                        this.formatDate(d.created_at)
                    })
                })
                .catch(err => console.log(err.response))
                .finally(() => (this.loading = false))
        },

        formatDate(date){
            const d = new Date(date)
            switch(d.getMonth()+1){
                case 1:
                var month = 'Januari';
                break;
                case 2:
                var month = 'Februari';
                break;
                case 3:
                var month = 'Maret';
                break;
                case 4:
                var month = 'April';
                break;
                case 5:
                var month = 'Mei';
                break;
                case 6:
                var month = 'Juni';
                break;
                case 7:
                var month = 'Juli';
                break;
                case 8:
                var month = 'Agustus';
                break;
                case 9:
                var month = 'September';
                break;
                case 10:
                var month = 'Oktober';
                break;
                case 11:
                var month = 'November';
                break;
                case 12:
                var month = 'Desember';
                break;
                default:
                var month  = 'Tidak ada';
                break;
              }
            this.created = d.getDate() +' ' +month+ ' ' + d.getFullYear() 
            console.log(this.created)

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
