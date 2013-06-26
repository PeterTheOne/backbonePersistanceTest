window.router = new (Backbone.Router.extend({

    start: function() {
        Backbone.history.start();
    },

    routes: {
        '': 'index',
        'fetchOnePants/:id': 'fetchOnePants',
        'addOnePants/:name': 'addOnePants',
        'updateOnePants/:id/:name': 'updateOnePants'
    },

    index: function() {
        window.location = '#pants/1';
    },

    fetchOnePants: function(id) {
        var pants = new Pants();

        pants.fetch({
            data: {
                id: id
            }
        });
    },

    addOnePants: function(name) {
        var pants = new Pants({name: name});

        pants.save();
    },

    updateOnePants: function(id, name) {
        var pants = new Pants({id: id});

        pants.save({name: name});
    }

}));