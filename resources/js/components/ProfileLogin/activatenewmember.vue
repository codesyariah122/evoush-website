<template>
    <div>
        <div v-if="length > 0">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong
                    >Halo
                    <span style="text-transform: capitalize;">{{
                        profile.name
                    }}</span
                    >!</strong
                >
                Anda mempunyai <strong>{{ length }}</strong> member baru join,
                menunggu di aktivasi. <br />
                untuk aktivasi silahkan klik tombol aktivasi member baru dibawah ini
                <br />
                <center>
                    <a
                        href="/dashboard/evoush/member"
                        class="btn btn-success btn-sm"
                        target="_blank"
                        >Aktivasi Member</a
                    >
                </center>

                <button
                    type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
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
            length: null
        };
    },

    mounted() {
        this.getMemberJoinInActive()
    },

    methods: {
        getMemberJoinInActive() {
            this.axios
                .get(`/api/member/join/inactive/${this.profileData.username}`)
                .then(res => {
                    this.length = res.data.length;
                })
                .catch(err => console.log(err.response))
                .finally(() => (this.loading = false))
        }
    }
};
</script>

<style scoped></style>
