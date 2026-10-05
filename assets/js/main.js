(function(){
  var b=document.querySelector('.burger'),n=document.getElementById('nav');
  if(b&&n)b.addEventListener('click',function(){var o=n.classList.toggle('open');b.setAttribute('aria-expanded',o?'true':'false');});

  var CAT={nonmetal:'Reactive nonmetal',noble:'Noble gas',alkali:'Alkali metal',alkaline:'Alkaline earth metal',metalloid:'Metalloid',halogen:'Halogen',transition:'Transition metal',post:'Post-transition metal'};
  // Periodic table click
  var info=document.getElementById('el-info');
  document.querySelectorAll('.el').forEach(function(el){el.addEventListener('click',function(){
    document.querySelectorAll('.el').forEach(function(x){x.setAttribute('aria-pressed','false');});el.setAttribute('aria-pressed','true');
    var d=el.dataset;var big=info.querySelector('.big');big.className='big el '+d.cat;
    big.querySelector('small').textContent=d.z;big.querySelector('b').textContent=d.s;big.querySelector('span').textContent=d.name;
    info.querySelector('[data-k=name]').textContent=d.name;info.querySelector('[data-k=z]').textContent=d.z;
    info.querySelector('[data-k=m]').textContent=d.m;info.querySelector('[data-k=cat]').textContent=CAT[d.cat];
    info.querySelector('[data-k=pos]').textContent='Period '+d.p+', Group '+d.g;info.querySelector('[data-k=fact]').textContent=d.fact;
  });});

  // Molar mass calculator
  var M={H:1.008,He:4.0026,Li:6.94,Be:9.0122,B:10.81,C:12.011,N:14.007,O:15.999,F:18.998,Ne:20.180,Na:22.990,Mg:24.305,Al:26.982,Si:28.085,P:30.974,S:32.06,Cl:35.45,Ar:39.948,K:39.098,Ca:40.078,Sc:44.956,Ti:47.867,V:50.942,Cr:51.996,Mn:54.938,Fe:55.845,Co:58.933,Ni:58.693,Cu:63.546,Zn:65.38,Ga:69.723,Ge:72.630,As:74.922,Se:78.971,Br:79.904,Kr:83.798,Ag:107.87,Sn:118.71,I:126.90,Ba:137.33,Au:196.97,Pb:207.2};
  function parse(f){var i=0;function num(){var s='';while(i<f.length&&/[0-9]/.test(f[i]))s+=f[i++];return s?parseInt(s,10):1;}
    function group(){var c={};while(i<f.length&&f[i]!==')'){
      if(f[i]==='('){i++;var g=group();if(f[i]!==')')throw 'Missing closing bracket';i++;var k=num();for(var e in g)c[e]=(c[e]||0)+g[e]*k;}
      else if(/[A-Z]/.test(f[i])){var sym=f[i++];while(i<f.length&&/[a-z]/.test(f[i]))sym+=f[i++];if(!M[sym])throw 'Unknown element: '+sym;var q=num();c[sym]=(c[sym]||0)+q;}
      else throw 'Unexpected character: '+f[i];}
      return c;}
    var r=group();if(i<f.length)throw 'Unexpected ")"';return r;}
  var fin=document.getElementById('formula'),fout=document.getElementById('mm-out');
  function calc(){if(!fin)return;var f=fin.value.replace(/\s+/g,'');if(!f){fout.innerHTML='Type a formula such as <code>H2O</code>.';return;}
    try{var c=parse(f),tot=0,rows='';for(var e in c){var m=c[e]*M[e];tot+=m;rows+='<tr><td>'+e+'</td><td>'+c[e]+' &times; '+M[e]+'</td><td style="text-align:right">'+m.toFixed(3)+'</td></tr>';}
      fout.innerHTML='Molar mass of <code>'+f.replace(/</g,'')+'</code>: <b>'+tot.toFixed(2)+' g/mol</b><table>'+rows+'</table>';}
    catch(err){fout.textContent='Hmm, check the formula. '+err;}}
  if(fin){fin.addEventListener('input',calc);document.querySelectorAll('[data-f]').forEach(function(x){x.addEventListener('click',function(){fin.value=x.dataset.f;calc();});});calc();}

  // Balancing practice
  var chk=document.getElementById('bal-check'),msg=document.getElementById('bal-msg');
  if(chk){chk.addEventListener('click',function(){var all=0,good=0;document.querySelectorAll('.eq input').forEach(function(inp){all++;var v=parseInt(inp.value||'1',10);var ok=v===parseInt(inp.dataset.a,10);inp.classList.toggle('ok',ok);inp.classList.toggle('no',!ok);if(ok)good++;});
    msg.textContent=good===all?'Perfect! Every equation is balanced.':good+' of '+all+' coefficients correct. Count each atom on both sides and try again.';});
    document.getElementById('bal-show').addEventListener('click',function(){document.querySelectorAll('.eq input').forEach(function(inp){inp.value=inp.dataset.a;inp.classList.add('ok');inp.classList.remove('no');});msg.textContent='Answers shown. Notice how atoms of each element match on both sides.';});}

  // Cookie
  var k=document.getElementById('cookie'),v=null;try{v=localStorage.getItem('chd_cookie');}catch(e){}
  if(k&&!v)k.classList.add('show');
  document.querySelectorAll('[data-cookie]').forEach(function(x){x.addEventListener('click',function(){try{localStorage.setItem('chd_cookie',x.dataset.cookie);}catch(e){}k.classList.remove('show');});});
  var y=document.getElementById('year');if(y)y.textContent=new Date().getFullYear();
})();
