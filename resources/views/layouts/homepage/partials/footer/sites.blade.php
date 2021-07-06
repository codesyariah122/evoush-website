<div id="site-link-footer">
	<ul class="thumbnail-widget">
		<li v-for="link in links" :key="link.id">
			<div class="thumb-content"><a :href="link.url" v-html="link.name">
			</a></div> 
		</li>
	</ul>
</div>

