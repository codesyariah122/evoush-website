<template>
	<div>
		<div v-for="detail in details">
			<b-card no-body class="overflow-hidden" style="max-width: 540px;">
				<b-row no-gutters>
					<b-col md="6">
						<b-card-img :src="`../../../storage/${detail.cover}`" class="rounded-0"></b-card-img>
					</b-col>
					<b-col md="6">
						
						<b-card-body>
							<h3>{{detail.title}}</h3>
							<blockquote class="text-secondary">
								{{detail.mini_description}}
							</blockquote>

							<b-card-text>
								{{detail.description}}
							</b-card-text>
						</b-card-body>

					</b-col>
				</b-row>
			</b-card>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'DetailProduct',
		props: {
			details: Object
		}
	}
</script>