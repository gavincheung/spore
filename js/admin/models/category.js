window.Category = Backbone.Model.extend({

	urlRoot: "",
});

window.CategoryCollection = Backbone.Collection.extend({

	model: Category,

	url: "category/treeLoad"
});