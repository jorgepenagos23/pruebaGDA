<template>
    <div id="app">
        <Navbar class="Navbar"></Navbar>
        <div class="navigation-drawer">
        </div>
        <main>
            <router-view></router-view>
        </main>
    </div>
</template>

<style>

.Navbar {
    position: fixed;
    width: 100%;
    z-index: 1000;
}


.navigation-drawer {
    position: fixed;
    z-index: 999;
}


main {
    margin-top: 120px;
    position: relative;
    z-index: 1;
}
</style>
