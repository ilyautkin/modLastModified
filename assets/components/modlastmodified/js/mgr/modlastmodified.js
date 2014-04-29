var modLastModified = function(config) {
	config = config || {};
	modLastModified.superclass.constructor.call(this,config);
};
Ext.extend(modLastModified,Ext.Component,{
	page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {},view: {}
});
Ext.reg('modlastmodified',modLastModified);

modLastModified = new modLastModified();