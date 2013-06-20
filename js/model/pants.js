window.Pants = Backbone.Model.extend({
    url: 'getPantsById.php',

    sync: function(method, model, options) {
        options = options || {};

        switch (method) {
            case 'read':
                options.url = 'getPantsById.php';
                break;
            case 'create':
                options.url = 'postPants.php';
                break;
            case 'update':
                options.url = 'getPantsById.php';
                break;
            case 'delete':
                options.url = 'getPantsById.php';
                break;
            default:
                options.url = 'getPantsById.php';
                break;
        }

        return Backbone.sync(method, model, options);
    }
});