
// var treeView = function(data) {
//
//     data = JSON.parse(data);
//     function expand(elements, root) {
//         if(root == undefined){
//             root = 'id="myUL"';
//         }
//         var tree = '<ul ' + root + '>';
//         for (var i=0; i < elements.length; i ++) {
//             tree += '<li><span class="caret">'+elements[i]['name']+'</span>';
//             if (elements[i]['children'] !== undefined) {
//                 tree += expand(elements[i]['children'], 'class="nested"');
//             }
//             tree += '</li>';
//         }
//         tree += '</ul>';
//         return tree;
//     }
//     return expand(data);
// }

var treeView = {
    init : function(data) {
        data = JSON.parse(data);
        function expand(elements, root) {
            if(root == undefined){
                root = 'id="myUL"';
            }
            var tree = '<ul ' + root + '>';
            for (var i=0; i < elements.length; i ++) {
                tree += '<li>';
                if (elements[i]['children'] !== undefined) {
                    tree += '<span class="caret caret-expand">'+elements[i]['name']+'</span>';
                    tree += expand(elements[i]['children'], 'class="nested"');
                }else{
                    tree += '<li>'+elements[i]['name'];
                }
                tree += '</li>';
            }
            tree += '</ul>';
            return tree;
        }
        return expand(data);
    },
    // expandAll : function() {
    //     var element = document.getElementsByClassName("nested");
    //
    //     const keys = Object.keys(element)
    //     for (const key of keys) {
    //         element[key].classList.add("active")
    //     }
    // }
};

var ajaxTreeView = function(data) {

    data = JSON.parse(data);

    var tree = '<ul class="nested active">';
    for (var i=0; i < data.length; i ++) {
        tree += '<li>';
        if (data[i]['children']) {
            tree += '<span class="caret caret-expand" data-val="'+data[i]['entry_id']+'">'+data[i]['name']+'</span>';
        }else{
            tree += '<li>'+data[i]['name'];
        }
        tree += '</li>';
    }
    tree += '</ul>';
    return tree;
}