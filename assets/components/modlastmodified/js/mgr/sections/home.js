modLastModified.page.Home = function(config) {
	config = config || {};
	Ext.applyIf(config,{
		components: [{
			xtype: 'modlastmodified-panel-home'
			,renderTo: 'modlastmodified-panel-home-div'
		}]
	}); 
	modLastModified.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(modLastModified.page.Home,MODx.Component);
Ext.reg('modlastmodified-page-home',modLastModified.page.Home);