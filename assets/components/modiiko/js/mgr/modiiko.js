var modiiko = function (config) {
	config = config || {};
	modiiko.superclass.constructor.call(this, config);
};
Ext.extend(modiiko, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('modiiko', modiiko);

modiiko = new modiiko();