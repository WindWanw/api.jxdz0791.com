<!DOCTYPE html>
<html lang="en">
@include('head')

</nav>
@if ($a->pic)
<img src="<?php echo ($a->pic); ?>" class="banner">
@else
<img src="{{ URL::asset('image/standard/banner.png') }}" class="banner">
@endif

<div style="height: 60px;"></div>


<div class="container standard-container2" style="padding-bottom:20px;">
    <div class="standard-container2-left" id="standard-container2-left">

    </div>

    <div class="standard-container2-right">
        <h1 class="jzgc" style="margin-bottom: 20px;">{{$list2['data']['title']}}</h1>



        <div class="standard-container2-context">
            {!! htmlspecialchars_decode($list2['data']['content']) !!}


        </div>

    </div>


</div>
<input type="hidden" value=<?php echo $list1;  ?> name='ssss' />
<input type="hidden" value=<?php echo $list2['id'];  ?> name='eeee' />
@include('foot')

<script>
    var standard = ele = getEle("#standard-container2-left");
    var children = $('input[name="ssss"]').val();
    var str = $('input[name="eeee"]').val();
    children = JSON.parse(children);

    // var children = [{
    //         id: 1,
    //         title: "施工总承包（新标准）",
    //         children: [{
    //                 id: 2,
    //                 title: "地基基础工程",
    //                 children: [{
    //                         id: 3,
    //                         title: "城市及道路照明工程"
    //                     },
    //                     {
    //                         id: 10,
    //                         title: "城市及道路照明工程66",
    //                     },
    //                 ]
    //             },
    //             {
    //                 id: "5",
    //                 title: "地基基础工程2",
    //             }
    //         ]
    //     },
    //     {
    //         id: 5,
    //         title: "施工总承包（新标准）2",
    //         children: [{
    //             id: 8,
    //             title: "地基基础工程2"
    //         }]
    //     }
    // ];

    function highlight(str) {
        if (!str) return;

        var strArr = str.split("-");
        var ele = standard.children[0];
        for (var i = 0, len = strArr.length; i < len; i++) {
            var item = strArr[i];



            if (i == 0) {
                var parentEle = ele.children[item];
                $(parentEle).find(".jia")[0].click();
                ele = parentEle.children[1];

            } else {
                if (ele.tagName === "LI") {
                    ele = ele.children[1]
                }
                ele.children[item].click();

                ele = ele.children[item];

                $($(ele).find("span")[0]).addClass("active")

            }

        }
    }

    function clickParent(ele, obj) {
        obj = obj || {};
        if (ele && ele.children && ele.children.length) {
            ele.children[0].click();
            return clickParent(ele.children[0], obj);
        } else {
            return obj.ele = ele;
        }
    }

    //点击 第一级的加号或者减号 时候触发
    /**
     *  点击  第一级
     * @param e 当前元素
     * @param parentEle  父元素
     * @param item 原有数据
     */
    function toggleEle(e, parentEle, item) {
        if (!parentEle) return;
        var target = e.target;
        var nextSibling = target.nextSibling;

        // 说明点击 加
        if (nextSibling.tagName === "IMG") {
            if (parentEle.children) {
                var ele = parentEle.children[parentEle.children.length - 1];
                // 下级元素展开
                setCss(ele, {
                    display: "block"
                }).setCss(target, {
                    display: "none"
                }).setCss(nextSibling, {
                    display: "block"
                });
                hiddenEle(ele, "UL", {
                    display: "none"
                });
            }
        }
        //点击减号
        else {
            setCss(parentEle.children[parentEle.children.length - 1], {
                display: "none"
            }).setCss(target, {
                display: "none"
            }).setCss(target.previousElementSibling, {
                display: "block"
            })
        }

    }

    /**
     *点击 第二级别，3，，4，5，6.。。。触发
     * @param e   当前元素
     * @param item 当前 数据 todo
     * @param li   当前的父元素
     * @param index  第几级别
     */
    function handleClick(e, li, item, index) {
        e.stopPropagation(); //阻止冒泡
        var target = e.target;
        var ele = li.children[1];
        //说明有数据
        if (ele) {
            ele.style.display = "block";
        }
        //说明是最后一  级  发送 ajax
        else {
            ele = e.target;
            let obj = {
                parent: null,
                eleList: []
            };
            findParent(li, obj, "parentUl");
            findLastChildren(obj.parent, "SPAN", obj);
            if (obj.arr) {
                for (var i = 0; i < obj.arr.length; i++) {
                    var childrenEle = obj.arr[i];
                    childrenEle.setAttribute("class", "")
                }
            }
            setClassName(ele, ["active"]);
            // 发送 ajax   todo
            // alert(123);
            var id = item.id;
            $.ajax({
                type: "POST",
                url: "{{ url('standard/id') }}",
                dataType: 'json',
                header: {
                    'X-CRSF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "id": id,
                    '_token': '{{csrf_token()}}'
                },
                success: function(data) {
                    if (data == 1) {
                        $(".jzgc").html("")
                        $(".standard-container2-context").html(
                            "<p>暂无数据</p>"
                        )

                    } else {

                        $(".jzgc").html(data.title)
                        $(".standard-container2-context").html(data.content)
                    }

                }

            });



        }

    }

    /**
     *
     * @param ele  元素
     * @param obj  对象 用来装 父元素
     * @param name  寻找的class 类名 条件
     * @returns {*}
     */
    function findParent(ele, obj, name) {
        if (!ele) return;
        if (ele.parentNode !== null && !ele.parentNode.className.includes(name))
            return findParent(ele.parentNode, obj, name);
        else
            obj.parent = ele.parentNode;
    }

    /**
     *
     * @param ele       元素
     * @param eleName  寻找的条件
     * @param obj      装找到的元素 object  {arr:[]}
     */
    function findLastChildren(ele, eleName, obj) {
        if (!ele) return;
        if (Object.prototype.toString.call(obj).indexOf("Object") === -1) return;
        if (!ele.children.length) {
            if (ele.tagName.toUpperCase() === eleName.toUpperCase()) {
                if (obj.arr) {
                    obj.arr.push(ele);
                } else {
                    obj.arr = [ele];
                }
            }
            return;
        }
        var children = ele.children;
        if (children) {
            for (var i = 0; i < children.length; i++) {
                var childrenEle = children[i];
                findLastChildren(childrenEle, eleName, obj);
            }
        }

    }

    function hiddenEle(ele, tagName, styleObj) {
        if (ele) {
            var children = ele.children;
            if (children) {
                for (var i = 0, len = children.length; i < len; i++) {
                    var childrenEle = children[i];
                    if (childrenEle && childrenEle.children) {
                        childrenEle = childrenEle.children;
                        for (var j = 0, len2 = childrenEle.length; j < len2; j++) {
                            if (childrenEle[j].tagName === tagName) {
                                setCss(childrenEle[j], styleObj)
                            }
                        }
                    }
                }
            }
        }
    }

    function getEle(eleName) {
        eleName = eleName || "";
        if (eleName.startsWith("#"))
            return document.getElementById(eleName.slice(1));
        else return document.querySelectorAll(eleName)
    }

    function createEle(eleName) {
        if (eleName == null) return null;
        return document.createElement(eleName);
    }

    function setClassName(ele, classNameArr) {
        let length = classNameArr.length;
        if (!ele || !ele.setAttribute || !ele.classList) return;
        for (var i = 0; i < length; i++) {
            let name = classNameArr[i];
            ele.classList.add(name)
        }
        return ele;
    }


    function loop(data, cb) {
        if (Object.prototype.toString.call(data).indexOf("Array") === -1) return;
        if (Object.prototype.toString.call(cb).indexOf("Function") === -1) return;
        var length = data.length;

        for (let i = 0; i < length; i++) {
            cb && cb(data[i], i);
        }

        return this;
    }

    function setCss(ele, styleObj) {

        if (Object.prototype.toString.call(styleObj).indexOf("Object") === -1) return;

        if (!ele || !ele.style) return;
        for (let key in styleObj) {
            ele.style[key] = styleObj[key];
        }
        return this;
    }

    function append(parentEle, children, index) {
        var ul = createEle("ul");
        if (!index) index = 1;
        let left = index * 10 + "px";
        ul.style.marginLeft = left;
        loop(children, function(item) {
            var li = setClassName(createEle("li"), ["parent"]);
            var span = createEle("span");
            eleAppendText(span, item.title);
            setCss(span, {
                width: "calc(100% - " + left + ")",
                whiteSpace: "nowrap",
                overflow: "hidden",
                textOverflow: "ellipsis",
                display: "blo1ck"
            });
            //说明是1级
            if (index === 1) {
                setCss(span, {
                    paddingLeft: "15px"
                });
            }
            span.setAttribute("title", item.title);
            li.appendChild(span);
            li.onclick = function(e) {
                console.log(item.id);
                // return false;
                handleClick(e, li, item, index)
            };
            if (item.children && item.children.length) {
                if (index === 1) {
                    setCss(span, {
                        fontWeight: "bold"
                    })
                }
                append(li, item.children, index + 1);
            } else {
                //最后一层
                $(li).find(span).click(function(e) {
                    e.stopPropagation()
                    window.location.replace("/standard-" + item.id + ".html");
                })

            }
            ul.appendChild(li);
        });
        setCss(ul, {
            width: "100%",
            display: "none"
        });
        parentEle.appendChild(ul);
    }

    function eleAppendText(parentEle, text) {
        if (!text) return;
        var newText = document.createTextNode(text);
        parentEle && parentEle.appendChild(newText);
    }

    function createUl(children) {
        if (Object.prototype.toString.call(children).indexOf("Array") === -1) return;
        var parentUl = setClassName(createEle("ul"), ["standard-left-list"]);
        loop(children, function(item) {
            var li = setClassName(createEle("li"), ["parent"]);
            var span = createEle("span");
            var jiaImg = setClassName(createEle("img"), ["jia"]);
            jiaImg.setAttribute("src", "{{ URL::asset('image/jia.png') }}");
            var jianImg = setClassName(createEle("img"), ["jia", "jian"]);
            jianImg.setAttribute("src", "{{ URL::asset('image/jian.png') }}");
            jianImg.style.display = "none";
            span.appendChild(jiaImg);
            span.appendChild(jianImg);
            eleAppendText(span, item.title);
            li.appendChild(span);
            jianImg.onclick = jiaImg.onclick = function(e) {
                toggleEle(e, li, item);
            };
            append(li, item.children);
            setClassName(parentUl, ["parentUl"]);
            parentUl.append(li);
        });
        parentUl.style.fontSize = "12px";
        ele.appendChild(parentUl);
    }

    createUl(children);

    highlight(str);
</script>

<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?82655e092b04e02aee7295b103cf4fa6";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<script>
    (function() {
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        } else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>
</body>

</html>