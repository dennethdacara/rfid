<template>
    <div>
        <b-navbar toggleable="lg" type="light" variant="white" fixed="top" class="border-bottom">
            
            <b-navbar-brand href="#">
                <b-img :src="navImage" height="27" width="27" fluid alt="Responsive image"></b-img>
                WeBuff Solutions
            </b-navbar-brand>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>

                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
                
                    <b-nav-item-dropdown right>
                        <!-- Using 'button-content' slot -->
                        <template slot="button-content"><em>Master, WeBuff</em></template>
                        <b-dropdown-item href="#">Account Settings</b-dropdown-item>
                        <b-dropdown-item href="#">User Activity Logs</b-dropdown-item>
                        <b-dropdown-item href="#">Sign Out</b-dropdown-item>
                    </b-nav-item-dropdown>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>
export default {
    name: "Navbar",
    data () {
        return {
            navImage: require('@/assets/webuff_logo.png')
        }
    },
}
</script>

<style scoped>
    .border-bottom {
        border-bottom: 1px solid #dee2e6!important;
        border-bottom-width: 1px !important;
        border-bottom-style: solid !important;
        border-bottom-color: rgb(222, 226, 230) !important;
    }
</style>
