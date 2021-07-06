<div id="evoush-app-footer">
	<ul class="thumbnail-widget">
		<li v-for="link in links" :key="link.id">
			<div class="thumb-content"><a :href="link.link" v-html="link.name">
			</a></div> 
		</li>
	</ul>
</div>