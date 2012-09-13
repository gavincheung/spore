var AppRouter = Backbone.Router.extend({

	routes: {
		""			: "list"
	},

	initialize: function() {
		console.log("AppRouter初始化");
	},

	list: function() {
		var categoryList = new CategoryCollection();
		categoryList.fetch({
			data: {'id':1, 'modelName':'Category'},
			success: function(){
				categoryListView = new CategoryListView({model: categoryList});
				$('#categories').html(categoryListView.el);
			}
		});
	}
});

utils.loadTemplate(['CategoryListView'], function() {
	app = new AppRouter();
	Backbone.history.start();
})