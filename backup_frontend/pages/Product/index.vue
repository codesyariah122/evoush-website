<template>
    <div>
        <Hero/>
        <h1 class="underline" style="margin-top: 5rem;"></h1>

        <PanelKosmetik/>
        <h1 class="underline" style="margin-top: 5rem;"></h1>

        <ParallaxBeauty/>

        <KosmetikList/>
        <h1 class="underline" style="margin-top: 5rem;"></h1>

        <PanelNutrisi/>
        <h1 class="underline" style="margin-top: 5rem;"></h1>

        <ParallaxHealthy/>

        <NutrisiList/>
        <h1 class="underline" style="margin-top: 5rem;"></h1>

        <ParallaxProduct/>

    </div>
</template>

<script>
    import Hero from '../../components/Product/hero'
    import PanelKosmetik from '../../components/Product/panelkosmetik'
    import ParallaxBeauty from '../../components/Product/parallaxbeauty'
    import KosmetikList from '../../components/Product/kosmetiklist'
    import PanelNutrisi from '../../components/Product/panelnutrisi'
    import ParallaxHealthy from '../../components/Product/parallaxhealthy'
    import NutrisiList from '../../components/Product/nutrisilist'
    import ParallaxProduct from '../../components/Product/parallaxproduct'

    export default {
        components: {
            Hero,
            PanelKosmetik,
            ParallaxBeauty,
            KosmetikList,
            PanelNutrisi,
            ParallaxHealthy,
            NutrisiList,
            ParallaxProduct
        }
    }
</script>

<style scoped>
    
    #product{
        width: 100%;
    }
    /* DESKTOP VERSION */
    @media (min-width: 992px) { 
        #product{
            width: 100%;
        }
        
    }
</style>