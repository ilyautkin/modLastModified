modLastModified.panel.Home = function(config) {
	config = config || {};
	Ext.apply(config,{
		border: false
		,baseCls: 'modx-formpanel'
		,items: [{
			html: '<h2>'+_('modlastmodified')+'</h2>'
			,border: false
			,cls: 'modx-page-header container'
		},{
			xtype: 'modx-tabs'
			,bodyStyle: 'padding: 10px'
			,defaults: { border: false ,autoHeight: true }
			,border: true
			,activeItem: 0
			,hideMode: 'offsets'
			,items: [{
				title: _('modlastmodified_items')
				,items: [{
					html: _('modlastmodified_intro_msg')
					,border: false
					,bodyCssClass: 'panel-desc'
					,bodyStyle: 'margin-bottom: 10px'
				},{
					xtype: 'modlastmodified-grid-items'
					,preventRender: true
				}]
			}]
		}]
	});
	modLastModified.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(modLastModified.panel.Home,MODx.Panel);
Ext.reg('modlastmodified-panel-home',modLastModified.panel.Home);
