<template>
    <div class="panel-body">
        <div class="d-flex align-items-center">
            <div>
                <a href="/profile/${username}">
                    <img class="user-picture" v-bind:src="profile_picture" alt="Commentator's profile picture">
                </a>
            </div>
            <div class="ml-3"> <div class="mr-3 user-name-div"><strong><a href="/profile/${username}">{{ username }}</a></strong> <span class="posted">{{ postedCalculation }}</span></div>
                <div class="comment-text">
                    {{ comment }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['username', 'profile_picture', 'date', 'comment'],

        computed: {
            postedCalculation: function() {
                const year = 31536000;
                const day = 86400;
                const hour = 3600;
                const minute = 60;

                const datePassedIn = Date.parse(this.date);
                const differenceInSeconds = Math.floor((Date.now() - datePassedIn) / 1000);

                let value = differenceInSeconds;
                let unit = '';

                if (differenceInSeconds >= year) {
                    value = Math.floor(differenceInSeconds / year);
                    unit = "year";
                }
                else if (differenceInSeconds >= day) {
                    value = Math.floor(differenceInSeconds / day);
                    unit = 'day';
                }
                else if (differenceInSeconds >= hour) {
                    value = Math.floor(differenceInSeconds / hour);
                    unit = 'hour';
                }
                else if (differenceInSeconds >= minute) {
                    value = Math.floor(differenceInSeconds / minute);
                    unit = 'minute';
                }
                else {
                    unit = 'second';
                }

                if (value !== 1) {
                    unit = unit + 's';
                }

                return value + ' ' + unit + " ago";
            }
        }
    }
</script>

<style scoped>
    .user-name-div strong a {
        color: #000;
    }

    .posted {
        color: #969696;
    }
</style>
