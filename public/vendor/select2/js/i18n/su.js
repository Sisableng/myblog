!(function () {
    if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
        var n = jQuery.fn.select2.amd;
    n.define("select2/i18n/su", [], function () {
        return {
            errorLoading: function () {
                return "Data teu tiasa dicandak.";
            },
            inputTooLong: function (n) {
                return "Hapuskeun " + (n.input.length - n.maximum) + " huruf";
            },
            inputTooShort: function (n) {
                return (
                    "Lebet keun " + (n.minimum - n.input.length) + " huruf deui"
                );
            },
            loadingMore: function () {
                return "Nyandak data…";
            },
            maximumSelected: function (n) {
                return "Anjeun ngan bisa milih " + n.maximum + " piliheun";
            },
            noResults: function () {
                return "Teu aya data anu sesuai";
            },
            searching: function () {
                return "Milari…";
            },
            removeAllItems: function () {
                return "Hapus item sadayana";
            },
        };
    }),
        n.define,
        n.require;
})();
