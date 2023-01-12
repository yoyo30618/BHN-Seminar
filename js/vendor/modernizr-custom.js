window.Modernizr=function(M,O,Q){function T(b){ae.cssText=b}function V(c,d){return T(al.join(c+";")+(d||""))}function X(c,d){return typeof c===d}function Z(c,d){return !!~(""+c).indexOf(d)}function ab(c,f){for(var g in c){var h=c[g];if(!Z(h,"-")&&ae[h]!==Q){return f=="pfx"?h:!0}}return !1}function ad(c,g,h){for(var i in c){var j=g[c[i]];if(j!==Q){return h===!1?c[i]:X(j,"function")?j.bind(h||g):j}}return !1}function af(f,g,h){var i=f.charAt(0).toUpperCase()+f.slice(1),j=(f+" "+an.join(i+" ")+i).split(" ");return X(g,"string")||X(g,"undefined")?ab(j,g):(j=(f+" "+ao.join(i+" ")+i).split(" "),ad(j,g,h))}function ah(){U.input=function(a){for(var b=0,f=a.length;b<f;b++){at[a[b]]=a[b] in ag}return at.list&&(at.list=!!O.createElement("datalist")&&!!M.HTMLDataListElement),at}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")),U.inputtypes=function(b){for(var c=0,g,j,k,l=b.length;c<l;c++){ag.setAttribute("type",j=b[c]),g=ag.type!=="text",g&&(ag.value=ai,ag.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(j)&&ag.style.WebkitAppearance!==Q?(Y.appendChild(ag),k=O.defaultView,g=k.getComputedStyle&&k.getComputedStyle(ag,null).WebkitAppearance!=="textfield"&&ag.offsetHeight!==0,Y.removeChild(ag)):/^(search|tel)$/.test(j)||(/^(url|email)$/.test(j)?g=ag.checkValidity&&ag.checkValidity()===!1:g=ag.value!=ai)),ar[b[c]]=!!g}return ar}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var S="2.8.3",U={},W=!0,Y=O.documentElement,aa="modernizr",ac=O.createElement(aa),ae=ac.style,ag=O.createElement("input"),ai=":)",ak={}.toString,al=" -webkit- -moz- -o- -ms- ".split(" "),am="Webkit Moz O ms",an=am.split(" "),ao=am.toLowerCase().split(" "),ap={svg:"http://www.w3.org/2000/svg"},aq={},ar={},at={},au=[],av=au.slice,aw,ax=function(b,g,h,o){var p,q,r,s,t=O.createElement("div"),u=O.body,v=u||O.createElement("body");if(parseInt(h,10)){while(h--){r=O.createElement("div"),r.id=o?o[h]:aa+(h+1),t.appendChild(r)}}return p=["&#173;",'<style id="s',aa,'">',b,"</style>"].join(""),t.id=aa,(u?t:v).innerHTML+=p,v.appendChild(t),u||(v.style.background="",v.style.overflow="hidden",s=Y.style.overflow,Y.style.overflow="hidden",Y.appendChild(v)),q=g(t,b),u?t.parentNode.removeChild(t):(v.parentNode.removeChild(v),Y.style.overflow=s),!!q},ay=function(a){var e=M.matchMedia||M.msMatchMedia;if(e){return e(a)&&e(a).matches||!1}var f;return ax("@media "+a+" { #"+aa+" { position: absolute; } }",function(c){f=(M.getComputedStyle?getComputedStyle(c,null):c.currentStyle)["position"]=="absolute"}),f},N=function(){function c(a,g){g=g||O.createElement(b[a]||"div"),a="on"+a;var h=a in g;return h||(g.setAttribute||(g=O.createElement("div")),g.setAttribute&&g.removeAttribute&&(g.setAttribute(a,""),h=X(g[a],"function"),X(g[a],"undefined")||(g[a]=Q),g.removeAttribute(a))),g=null,h}var b={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return c}(),P={}.hasOwnProperty,R;!X(P,"undefined")&&!X(P.call,"undefined")?R=function(c,d){return P.call(c,d)}:R=function(c,d){return d in c&&X(c.constructor.prototype[d],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(a){var f=this;if(typeof f!="function"){throw new TypeError}var g=av.call(arguments,1),h=function(){if(this instanceof h){var b=function(){};b.prototype=f.prototype;var c=new b,d=f.apply(c,g.concat(av.call(arguments)));return Object(d)===d?d:c}return f.apply(a,g.concat(av.call(arguments)))};return h}),aq.flexbox=function(){return af("flexWrap")},aq.canvas=function(){var b=O.createElement("canvas");return !!b.getContext&&!!b.getContext("2d")},aq.canvastext=function(){return !!U.canvas&&!!X(O.createElement("canvas").getContext("2d").fillText,"function")},aq.webgl=function(){return !!M.WebGLRenderingContext},aq.touch=function(){var a;return"ontouchstart" in M||M.DocumentTouch&&O instanceof DocumentTouch?a=!0:ax(["@media (",al.join("touch-enabled),("),aa,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(b){a=b.offsetTop===9}),a},aq.geolocation=function(){return"geolocation" in navigator},aq.postmessage=function(){return !!M.postMessage},aq.websqldatabase=function(){return !!M.openDatabase},aq.indexedDB=function(){return !!af("indexedDB",M)},aq.hashchange=function(){return N("hashchange",M)&&(O.documentMode===Q||O.documentMode>7)},aq.history=function(){return !!M.history&&!!history.pushState},aq.draganddrop=function(){var b=O.createElement("div");return"draggable" in b||"ondragstart" in b&&"ondrop" in b},aq.websockets=function(){return"WebSocket" in M||"MozWebSocket" in M},aq.rgba=function(){return T("background-color:rgba(150,255,150,.5)"),Z(ae.backgroundColor,"rgba")},aq.hsla=function(){return T("background-color:hsla(120,40%,100%,.5)"),Z(ae.backgroundColor,"rgba")||Z(ae.backgroundColor,"hsla")},aq.multiplebgs=function(){return T("background:url(https://),url(https://),red url(https://)"),/(url\s*\(.*?){3}/.test(ae.background)},aq.backgroundsize=function(){return af("backgroundSize")},aq.borderimage=function(){return af("borderImage")},aq.borderradius=function(){return af("borderRadius")},aq.boxshadow=function(){return af("boxShadow")},aq.textshadow=function(){return O.createElement("div").style.textShadow===""},aq.opacity=function(){return V("opacity:.55"),/^0.55$/.test(ae.opacity)},aq.cssanimations=function(){return af("animationName")},aq.csscolumns=function(){return af("columnCount")},aq.cssgradients=function(){var d="background-image:",e="gradient(linear,left top,right bottom,from(#9f9),to(white));",f="linear-gradient(left top,#9f9, white);";return T((d+"-webkit- ".split(" ").join(e+d)+al.join(f+d)).slice(0,-d.length)),Z(ae.backgroundImage,"gradient")},aq.cssreflections=function(){return af("boxReflect")},aq.csstransforms=function(){return !!af("transform")},aq.csstransforms3d=function(){var b=!!af("perspective");return b&&"webkitPerspective" in Y.style&&ax("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(a,d){b=a.offsetLeft===9&&a.offsetHeight===3}),b},aq.csstransitions=function(){return af("transition")},aq.fontface=function(){var b;return ax('@font-face {font-family:"font";src:url("https://")}',function(a,h){var i=O.getElementById("smodernizr"),j=i.sheet||i.styleSheet,k=j?j.cssRules&&j.cssRules[0]?j.cssRules[0].cssText:j.cssText||"":"";b=/src/i.test(k)&&k.indexOf(h.split(" ")[0])===0}),b},aq.generatedcontent=function(){var b;return ax(["#",aa,"{font:0/0 a}#",aa,':after{content:"',ai,'";visibility:hidden;font:3px/1 a}'].join(""),function(a){b=a.offsetHeight>=3}),b},aq.video=function(){var b=O.createElement("video"),e=!1;try{if(e=!!b.canPlayType){e=new Boolean(e),e.ogg=b.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),e.h264=b.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),e.webm=b.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,"")}}catch(f){}return e},aq.audio=function(){var b=O.createElement("audio"),e=!1;try{if(e=!!b.canPlayType){e=new Boolean(e),e.ogg=b.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),e.mp3=b.canPlayType("audio/mpeg;").replace(/^no$/,""),e.wav=b.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),e.m4a=(b.canPlayType("audio/x-m4a;")||b.canPlayType("audio/aac;")).replace(/^no$/,"")}}catch(f){}return e},aq.localstorage=function(){try{return localStorage.setItem(aa,aa),localStorage.removeItem(aa),!0}catch(b){return !1}},aq.sessionstorage=function(){try{return sessionStorage.setItem(aa,aa),sessionStorage.removeItem(aa),!0}catch(b){return !1}},aq.webworkers=function(){return !!M.Worker},aq.applicationcache=function(){return !!M.applicationCache},aq.svg=function(){return !!O.createElementNS&&!!O.createElementNS(ap.svg,"svg").createSVGRect},aq.inlinesvg=function(){var b=O.createElement("div");return b.innerHTML="<svg/>",(b.firstChild&&b.firstChild.namespaceURI)==ap.svg},aq.smil=function(){return !!O.createElementNS&&/SVGAnimate/.test(ak.call(O.createElementNS(ap.svg,"animate")))},aq.svgclippaths=function(){return !!O.createElementNS&&/SVGClipPath/.test(ak.call(O.createElementNS(ap.svg,"clipPath")))};for(var aj in aq){R(aq,aj)&&(aw=aj.toLowerCase(),U[aw]=aq[aj](),au.push((U[aw]?"":"no-")+aw))}return U.input||ah(),U.addTest=function(c,e){if(typeof c=="object"){for(var f in c){R(c,f)&&U.addTest(f,c[f])}}else{c=c.toLowerCase();if(U[c]!==Q){return U}e=typeof e=="function"?e():e,typeof W!="undefined"&&W&&(Y.className+=" "+(e?"":"no-")+c),U[c]=e}return U},T(""),ac=ag=null,function(t,u){function E(e,f){var g=e.createElement("p"),h=e.getElementsByTagName("head")[0]||e.documentElement;return g.innerHTML="x<style>"+f+"</style>",h.insertBefore(g.lastChild,h.firstChild)}function F(){var b=L.elements;return typeof b=="string"?b.split(" "):b}function G(c){var d=C[c[A]];return d||(d={},B++,c[A]=B,C[B]=d),d}function H(b,e,f){e||(e=u);if(D){return e.createElement(b)}f||(f=G(e));var h;return f.cache[b]?h=f.cache[b].cloneNode():y.test(b)?h=(f.cache[b]=f.createElem(b)).cloneNode():h=f.createElem(b),h.canHaveChildren&&!x.test(b)&&!h.tagUrn?f.frag.appendChild(h):h}function I(b,h){b||(b=u);if(D){return b.createDocumentFragment()}h=h||G(b);var i=h.frag.cloneNode(),j=0,k=F(),l=k.length;for(;j<l;j++){i.createElement(k[j])}return i}function J(c,d){d.cache||(d.cache={},d.createElem=c.createElement,d.createFrag=c.createDocumentFragment,d.frag=d.createFrag()),c.createElement=function(a){return L.shivMethods?H(a,c,d):d.createElem(a)},c.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+F().join().replace(/[\w\-]+/g,function(b){return d.createElem(b),d.frag.createElement(b),'c("'+b+'")'})+");return n}")(L,d.frag)}function K(b){b||(b=u);var d=G(b);return L.shivCSS&&!z&&!d.hasCSS&&(d.hasCSS=!!E(b,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),D||J(b,d),b}var v="3.7.0",w=t.html5||{},x=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,y=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,z,A="_html5shiv",B=0,C={},D;(function(){try{var b=u.createElement("a");b.innerHTML="<xyz></xyz>",z="hidden" in b,D=b.childNodes.length==1||function(){u.createElement("a");var c=u.createDocumentFragment();return typeof c.cloneNode=="undefined"||typeof c.createDocumentFragment=="undefined"||typeof c.createElement=="undefined"}()}catch(d){z=!0,D=!0}})();var L={elements:w.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:v,shivCSS:w.shivCSS!==!1,supportsUnknownElements:D,shivMethods:w.shivMethods!==!1,type:"default",shivDocument:K,createElement:H,createDocumentFragment:I};t.html5=L,K(u)}(this,O),U._version=S,U._prefixes=al,U._domPrefixes=ao,U._cssomPrefixes=an,U.mq=ay,U.hasEvent=N,U.testProp=function(b){return ab([b])},U.testAllProps=af,U.testStyles=ax,U.prefixed=function(d,e,f){return e?af(d,e,f):af(d,"pfx")},Y.className=Y.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(W?" js "+au.join(" "):""),U}(this,this.document),function(C,E,G){function H(b){return"[object Function]"==S.call(b)}function I(b){return"string"==typeof b}function J(){}function K(b){return !b||"loaded"==b||"complete"==b||"uninitialized"==b}function L(){var b=T.shift();U=1,b?b.t?Q(function(){("c"==b.t?F.injectCss:F.injectJs)(b.s,0,b.a,b.x,b.e,1)},0):(b(),L()):U=0}function M(b,g,h,m,n,p,q){function s(a){if(!v&&K(t.readyState)&&(x.r=v=1,!U&&L(),t.onload=t.onreadystatechange=null,a)){"img"!=b&&Q(function(){X.removeChild(t)},50);for(var c in ac[g]){ac[g].hasOwnProperty(c)&&ac[g][c].onload()}}}var q=q||F.errorTimeout,t=E.createElement(b),v=0,w=0,x={t:h,s:g,e:n,a:p,x:q};1===ac[g]&&(w=1,ac[g]=[]),"object"==b?t.data=g:(t.src=g,t.type=b),t.width=t.height="0",t.onerror=t.onload=t.onreadystatechange=function(){s.call(this,w)},T.splice(m,0,x),"img"!=b&&(w||2===ac[g]?(X.insertBefore(t,W?null:R),Q(s,q)):ac[g].push(t))}function N(e,g,h,i,j){return U=0,g=g||"j",I(e)?M("c"==g?Z:Y,e,g,this.i++,h,i,j):(T.splice(this.i++,0,e),1==T.length&&L()),this}function O(){var b=F;return b.loader={load:N,i:0},b}var P=E.documentElement,Q=C.setTimeout,R=E.getElementsByTagName("script")[0],S={}.toString,T=[],U=0,V="MozAppearance" in P.style,W=V&&!!E.createRange().compareNode,X=W?P:R.parentNode,P=C.opera&&"[object Opera]"==S.call(C.opera),P=!!E.attachEvent&&!P,Y=V?"object":P?"script":"img",Z=P?"script":Y,aa=Array.isArray||function(b){return"[object Array]"==S.call(b)},ab=[],ac={},ad={timeout:function(c,d){return d.length&&(c.timeout=d[0]),c}},D,F;F=function(c){function d(h){var h=h.split("!"),i=ab.length,j=h.pop(),l=h.length,j={url:j,origUrl:j,prefixes:h},o,p,q;for(p=0;p<l;p++){q=h[p].split("="),(o=ad[q.shift()])&&(j=o(j,q))}for(p=0;p<i;p++){j=ab[p](j)}return j}function e(b,l,o,p,q){var r=d(b),s=r.autoCallback;r.url.split(".").pop().split("?").shift(),r.bypass||(l&&(l=H(l)?l:l[b]||l[p]||l[b.split("/").pop().split("?")[0]]),r.instead?r.instead(b,l,o,p,q):(ac[r.url]?r.noexec=!0:ac[r.url]=1,o.load(r.url,r.forceCSS||!r.forceJS&&"css"==r.url.split(".").pop().split("?").shift()?"c":G,r.noexec,r.attrs,r.timeout),(H(l)||H(s))&&o.load(function(){O(),l&&l(r.origUrl,q,p),s&&s(r.origUrl,q,p),ac[r.url]=2})))}function f(g,o){function p(b,h){if(b){if(I(b)){h||(s=function(){var i=[].slice.call(arguments);t.apply(this,i),u()}),e(b,s,o,0,q)}else{if(Object(b)===b){for(w in v=function(){var a=0,i;for(i in b){b.hasOwnProperty(i)&&a++}return a}(),b){b.hasOwnProperty(w)&&(!h&&!--v&&(H(s)?s=function(){var i=[].slice.call(arguments);t.apply(this,i),u()}:s[w]=function(i){return function(){var a=[].slice.call(arguments);i&&i.apply(this,a),u()}}(t[w])),e(b[w],s,o,w,q))}}}}else{!h&&u()}}var q=!!g.test,r=g.load||g.both,s=g.callback||J,t=s,u=g.complete||J,v,w;p(q?g.yep:g.nope,!!r),r&&p(r)}var k,m,n=this.yepnope.loader;if(I(c)){e(c,0,n,0)}else{if(aa(c)){for(k=0;k<c.length;k++){m=c[k],I(m)?e(m,0,n,0):aa(m)?F(m):Object(m)===m&&f(m,n)}}else{Object(c)===c&&f(c,n)}}},F.addPrefix=function(c,d){ad[c]=d},F.addFilter=function(b){ab.push(b)},F.errorTimeout=10000,null==E.readyState&&E.addEventListener&&(E.readyState="loading",E.addEventListener("DOMContentLoaded",D=function(){E.removeEventListener("DOMContentLoaded",D,0),E.readyState="complete"},0)),C.yepnope=O(),C.yepnope.executeStack=L,C.yepnope.injectJs=function(b,f,g,h,m,n){var p=E.createElement("script"),q,r,h=h||F.errorTimeout;p.src=b;for(r in g){p.setAttribute(r,g[r])}f=n?L:f||J,p.onreadystatechange=p.onload=function(){!q&&K(p.readyState)&&(q=1,f(),p.onload=p.onreadystatechange=null)},Q(function(){q||(q=1,f(1))},h),m?p.onload():R.parentNode.insertBefore(p,R)},C.yepnope.injectCss=function(b,f,h,k,l,m){var k=E.createElement("link"),n,f=m?L:f||J;k.href=b,k.rel="stylesheet",k.type="text/css";for(n in h){k.setAttribute(n,h[n])}l||(R.parentNode.insertBefore(k,R),Q(f,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};