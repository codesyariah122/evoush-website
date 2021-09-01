<template>
    <div>
        <div class="col-md-6 col-xs-12 col-sm-12">
            <div class="card profile-card-2">
                <div class="card-img-block">
                    <div v-if="profile.cover">
                        <img
                            class="img-fluid"
                            :src="`../../../storage/${profile.cover}`"
                            alt="Card image cap"
                        />
                    </div>
                    <div v-else>
                        <img
                            class="img-fluid"
                            :src="noCover"
                            alt="Card image cap"
                        />
                    </div>
                </div>
                <div class="card-body pt-5">
                    <div v-if="profile.avatar">
                        <a
                            :href="`../../../storage/${profile.avatar}`"
                            class="profile"
                        >
                            <img
                                :src="`../../../storage/${profile.avatar}`"
                                class="img-fluid"
                                alt="Sample Image"
                            />
                        </a>
                    </div>
                    <div v-else>
                        <img
                            :src="noAvatar"
                            alt="profile-image"
                            class="profile"
                        />
                    </div>

                    <h5 class="card-title" style="text-transform: capitalize;">
                        {{ profile.name }}
                    </h5>

                    <div v-if="profile.quotes">
                        <blockquote class="card-text blockquote-footer">
                            {{ profile.quotes }}
                            <br />
                            <h6>Quotes by : {{ profile.username }}</h6>
                        </blockquote>
                    </div>
                    <div v-else>
                        <div class="alert alert-danger" role="alert">
                            {{ profile.username }}
                            <b>belum menambahkan quotes</b>
                        </div>
                    </div>

                    <h1 class="underline" style="margin-top: 2rem;"></h1>

                    <h5 class="text-center">Success Story</h5>
                    <div v-if="profile.about">
                        <p
                            class="card-text blockquote-footer"
                            v-html="profile.about"
                        ></p>
                    </div>

                    <div v-else>
                        <div class="alert alert-danger" role="alert">
                            {{ profile.username }}
                            <b>belum menambahkan success story</b>
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
            noCover:
                "https://images.pexels.com/photos/946351/pexels-photo-946351.jpeg?w=500&h=650&auto=compress&cs=tinysrgb",
            noAvatar:
                "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/profile/default.jpg"
        };
    }
};
</script>

<style scoped>
/*Profile card 2*/
.profile-card-2 .card-img-block {
    float: left;
    width: 100%;
    height: 150px;
    overflow: hidden;
}
.profile-card-2 .card-body {
    position: relative;
}
.profile-card-2 .profile {
    border-radius: 50%;
    position: absolute;
    top: -42px;
    left: 15%;
    max-width: 75px;
    border: 3px solid rgba(255, 255, 255, 1);
    -webkit-transform: translate(-50%, 0%);
    transform: translate(-50%, 0%);
}
.profile-card-2 h5 {
    font-weight: 600;
    color: #6ab04c;
}
.profile-card-2 .card-text {
    font-weight: 300;
    font-size: 15px;
}
.profile-card-2 .icon-block {
    float: left;
    width: 100%;
}
.profile-card-2 .icon-block a {
    text-decoration: none;
}
.profile-card-2 i {
    display: inline-block;
    font-size: 16px;
    color: #6ab04c;
    text-align: center;
    border: 1px solid #6ab04c;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    margin: 0 5px;
}
.profile-card-2 i:hover {
    background-color: #6ab04c;
    color: #fff;
}
</style>
