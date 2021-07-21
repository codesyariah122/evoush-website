<template>
    <div>
        <Hero />

        <!-- <PanelHeader/> -->
        <h1 class="underline" style="margin-top: 5rem;"></h1>

        <PanelIntents />
        <h1 class="underline" style="margin-top: 5rem;"></h1>

        <ParallaxHome />

        <PanelFocus />
        <h1 class="underline" style="margin-top: 3rem;"></h1>

        <ParallaxEnd />
    </div>
</template>

<script>
import Hero from "../../components/About/hero";
import PanelHeader from "../../components/About/panelheader";
import PanelIntents from "../../components/About/panelintents";
import ParallaxHome from "../../components/About/parallaxabout";
import PanelFocus from "../../components/About/panelfocus";
import ParallaxEnd from "../../components/About/parallaxend";

export default {
    components: {
        Hero,
        PanelHeader,
        PanelIntents,
        ParallaxHome,
        PanelFocus,
        ParallaxEnd
    }
};
</script>

<style scoped>
/*section {
		width: 100%;
	}*/
#about {
    width: 100%;
}
/* DESKTOP VERSION */
@media (min-width: 992px) {
    #about {
        width: 100%;
    }
}
</style>
