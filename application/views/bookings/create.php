

<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">View Avaliable Sites</a>
      </h4>
      <p>Time remaining: <span data-bind="text: time_remaining"></span></p>
    </div>
    <div id="collapse1" class="panel-collapse">
      <div class="panel-body" id="map" style="height: 438px;">
        
      </div>
    </div>
  </div>
</div>

<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2">Selected Sites</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse">
      <div class="panel-body">
        <table class="table">
          <thead>
            <tr>
              <th>Site Number</th>
              <th>Price</th>
              <th></th>
            </tr>
          </thead>
          <tbody data-bind="foreach:sites">
            <tr data-bind='if: selected'>
              <th data-bind="text: $data.number"></th>
              <th>$40</th>
              <th><a data-bind="click:function(){$root.remove_selected($data)}" class="btn btn-danger">Remove</a></th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<button class='btn btn-success' data-bind='click: function(){book_selected_sites()}'>Book these sites</button>


<!-- Modal -->
<div id="details_model" class="modal fade" role="dialog" data-bind='with: booking_info'>
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Booking Details</h2>
      </div>
      <div class="modal-body">
      <h4>Contact Details</h4>
        <div class="field-container">  
          <input type="text" class="field" required placeholder="Contact Name" data-bind="textInput: contact_name"/>
          <label class="floating-label">Contact Name</label> 
          <div class="field-underline"></div>
        </div>
        <div class="field-container">  
          <input type="text" class="field" required placeholder="Business Name" data-bind="textInput: business_name"/>
          <label class="floating-label">Business Name</label> 
          <div class="field-underline"></div>
        </div>
        <div class="field-container">  
          <textarea type="text" class="field" rows="1" required placeholder="Address" onkeyup="auto_grow(this)" data-bind="textInput: address"></textarea> 
          <label class="floating-label">Address</label> 
          <div class="field-underline"></div>
        </div>
        <div class="field-container">  
          <input type="text" class="field" required placeholder="Phone" data-bind="textInput: phone"/>
          <label class="floating-label">Phone</label> 
          <div class="field-underline"></div>
        </div>
        <br>
        <h4>Stall Information</h4>
        <div class="field-container">  
          <input type="text" class="field" required placeholder="What products are you selling?" data-bind="textInput: product_type"/>
          <label class="floating-label">What products are you selling?</label> 
          <div class="field-underline"></div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bind="click: function(){$parent.show_tc()}">Next</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="tc_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Terms and conditions</h2>
        <span>Please read all Terms and conditions and accept at the end</span>
      </div>
      <div id="tc_modal_body" class="modal-body modal-body-tc" data-bind=" with: $root.booking_info">

      <div class="panel panel-default">
        <div class="panel-body panel-body-tc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada pharetra erat sed fermentum. Cras vulputate dui mollis dui dignissim, eu condimentum tellus bibendum. Donec posuere dui dapibus dignissim gravida. Nunc pellentesque ligula neque, nec pretium metus dapibus et. Praesent quis est at dolor pharetra placerat ut imperdiet nulla. Suspendisse libero urna, convallis ut ipsum at, sagittis vulputate odio. Pellentesque finibus nisi id pellentesque iaculis. Sed a lorem elit. Donec at erat congue, dictum turpis sit amet, blandit tortor. Morbi mattis vitae ex in pulvinar. In hac habitasse platea dictumst. Phasellus efficitur neque purus, tempor aliquam arcu consectetur a. Morbi ultricies maximus purus vitae ornare.

          Etiam ut turpis auctor, lacinia nibh eget, ornare nisi. Morbi tincidunt vel tellus ac congue. Mauris suscipit tempus diam, quis ultricies risus congue at. Aenean nec dui quis sapien facilisis eleifend. Nam convallis semper erat tempus mollis. Vestibulum cursus dictum leo quis ultricies. Aliquam eu metus ornare, mollis urna ut, pulvinar ipsum. In porta feugiat posuere. Maecenas bibendum gravida erat, vulputate eleifend eros. Proin in quam ultrices, lacinia justo sit amet, efficitur magna. Nam at sagittis felis.

          Cras tristique, enim nec condimentum convallis, ex mi porttitor nulla, eu iaculis metus nunc sit amet justo. Fusce placerat augue et mauris fringilla elementum. Nullam sit amet aliquam ante, quis dignissim lorem. Fusce maximus nisi eget pretium semper. Aenean vitae nisi magna. Quisque aliquam semper purus, ac rhoncus sem sodales vitae. Cras suscipit viverra lorem at pharetra. Maecenas vulputate, felis elementum semper tincidunt, risus ante mollis lacus, ut semper odio mi in augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ac lobortis turpis, vitae tempus nisi. Praesent sodales turpis vitae laoreet fermentum.

          Suspendisse lobortis tincidunt sapien vel hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce fermentum sollicitudin eros, et bibendum purus cursus ac. Donec congue felis nec turpis efficitur ullamcorper. Quisque placerat ac est in sollicitudin. Quisque diam orci, commodo sed porta nec, bibendum eget sem. In sollicitudin massa ac nulla feugiat, ac egestas purus semper. Nulla tortor eros, eleifend eget ex a, lacinia iaculis sem. Donec vitae tempus ligula, id fringilla lectus. Vivamus ac faucibus tortor. Nunc nec enim quis ex commodo facilisis non nec leo. Fusce eleifend congue sapien, eget lacinia felis.

          Curabitur lacinia molestie lacus in luctus. In ut tempus libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ac libero felis. Nulla facilisi. Vestibulum molestie tristique nulla vel maximus. Phasellus luctus, nunc ut gravida viverra, velit nunc efficitur metus, ut sodales mauris neque ac ex. Aliquam cursus mauris felis, at porttitor purus elementum ut. Morbi sed nunc vitae tortor tincidunt finibus et eget purus. Nunc nec lacinia sem. Proin ut sapien metus. Fusce egestas consequat augue, pulvinar luctus eros commodo vitae. Quisque in viverra est. Phasellus semper fermentum ipsum, et pulvinar est mollis vel. Etiam facilisis pretium dapibus. Phasellus vel ultricies urna.

          Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse accumsan eleifend massa. Donec ac erat pretium leo bibendum dapibus. Vestibulum quis volutpat eros. Duis ac magna vulputate, mattis quam et, feugiat massa. Aliquam rutrum nisl nec consectetur placerat. Phasellus velit ante, sagittis sed nisi eu, egestas dignissim odio. Suspendisse eget accumsan nulla. Etiam arcu mi, mattis sed ligula ac, ornare fermentum ante. Interdum et malesuada fames ac ante ipsum primis in faucibus. In placerat efficitur ultrices. Proin mollis at felis et ornare. Nunc dolor urna, maximus eu pulvinar a, viverra ac ante. Ut et dolor leo. Integer ornare tortor sit amet metus consectetur maximus.

          Ut luctus, ante a cursus iaculis, ex dui aliquam enim, vehicula consequat enim nisl eget enim. Morbi tincidunt nulla et erat pulvinar auctor. Nulla bibendum, ipsum sed pellentesque porttitor, urna massa viverra lacus, quis consectetur augue erat nec nunc. Aliquam erat volutpat. Integer lorem leo, tincidunt in scelerisque eu, faucibus vel magna. In scelerisque faucibus neque, in pretium turpis tempus eget. Praesent ac lobortis felis, ac sollicitudin est. Cras ac odio condimentum, mollis orci ut, ornare ante. Fusce vestibulum odio ac neque posuere, non lobortis lorem pharetra. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque maximus turpis ac ex consectetur congue. Suspendisse dictum tristique elit id imperdiet. Suspendisse potenti. Fusce cursus mi nisi, nec eleifend sem fringilla vel. Integer ultricies, massa vitae tincidunt vehicula, leo risus placerat est, vel dictum tellus velit eu felis.

          Sed suscipit eu libero quis porta. Donec felis magna, ultricies eget dapibus at, egestas eu dui. Donec dictum augue justo, sed elementum diam ultricies non. Morbi at felis congue, mattis arcu id, tempor tortor. Nulla facilisi. Etiam lacus urna, molestie luctus sodales eget, blandit ut lectus. Sed at purus pharetra, vehicula justo vitae, molestie enim. Fusce quis commodo est. Quisque faucibus tristique finibus. Duis vitae mauris sit amet dui faucibus eleifend et ut libero. Pellentesque et dapibus metus, feugiat accumsan urna. Proin ornare nisl vitae massa gravida, ac sollicitudin purus pretium. Vestibulum rhoncus posuere ullamcorper.

          Integer vel augue ut mauris finibus fermentum at a nulla. Donec viverra leo lectus, at fermentum ligula congue sed. Nullam tellus dui, lobortis nec elementum ut, gravida hendrerit ligula. Duis porta augue eget orci mollis tempor. Proin euismod, orci non fringilla tempor, eros sapien commodo sem, scelerisque lacinia leo massa a quam. Maecenas in sem felis. Etiam non est sit amet lectus consectetur congue porta vel mi. Maecenas aliquet, justo nec pellentesque dapibus, augue mi tincidunt eros, hendrerit placerat lorem nibh eget est. In facilisis posuere elit quis faucibus.

          Aenean turpis tortor, tincidunt ac tellus in, viverra elementum massa. Suspendisse quis sem dignissim, dapibus dui eget, ultrices libero. Aenean eget dictum diam. Integer fermentum ante ut convallis tempus. Etiam porttitor et diam ut vulputate. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi mauris ex, imperdiet vel diam eget, pulvinar laoreet eros. Cras pharetra orci vel venenatis accumsan. Maecenas tristique orci nec malesuada commodo. Suspendisse malesuada placerat lectus quis finibus. Sed sit amet urna arcu.

          Nam feugiat arcu sed blandit mattis. Nunc a imperdiet erat. Integer vitae nibh ac turpis hendrerit viverra. Etiam viverra quis metus eu porttitor. Sed condimentum mi facilisis metus suscipit, id fermentum est consequat. Proin ut purus quam. Ut a odio sed metus porttitor fermentum vel sollicitudin dolor. Morbi cursus viverra diam eu euismod. Vivamus eleifend quam eu enim accumsan, eget venenatis elit laoreet. Proin sit amet orci non nisi vestibulum condimentum sed eu quam. Sed arcu dolor, pharetra vitae euismod et, lobortis at sapien. Pellentesque massa tortor, egestas vel laoreet sed, varius non risus. Morbi nec facilisis enim, eget ultrices arcu. Nulla facilisi. Vivamus non elementum urna.

          Ut vitae eros dolor. Etiam bibendum, magna vel ultricies tincidunt, ligula nisl posuere sapien, sit amet faucibus mauris lorem eget lectus. Proin cursus mauris cursus mauris aliquet, ut elementum nulla commodo. Nam porta, enim id consectetur hendrerit, risus quam tempus ex, vitae ultrices nibh arcu non dui. Fusce suscipit, est sit amet dapibus ultrices, ligula nulla pulvinar mauris, at lobortis erat arcu ac arcu. Aenean auctor dictum nulla eu consectetur. Nulla quis dolor nec neque feugiat aliquet. Suspendisse et maximus mauris. Aenean sit amet cursus lacus.

          In fermentum, enim eu porta lacinia, tellus nisl rutrum tortor, in rhoncus eros nisl sed arcu. Vivamus nulla ipsum, eleifend a augue vitae, ultricies tristique elit. Cras non sem quis risus eleifend imperdiet in eu ante. Nam semper urna neque, ut luctus mauris pharetra a. Fusce ac sapien id ipsum faucibus egestas quis eget enim. Donec risus est, feugiat nec dui vel, molestie porttitor ligula. Nulla faucibus, magna at venenatis tincidunt, metus libero dictum nulla, et efficitur sem sem ut nibh. Curabitur finibus iaculis dolor consequat efficitur. Maecenas condimentum sapien lorem, eu porta nibh ultricies et. Nunc pharetra arcu a erat aliquam, eu tristique risus malesuada.

          Ut sollicitudin erat enim. In tincidunt mi ut nisl auctor, quis consectetur diam tempor. In odio leo, pulvinar non massa sed, dapibus molestie ex. Fusce porttitor ex ornare, dignissim sapien ut, consectetur nisi. Donec quis cursus sapien. Cras ultrices est at tellus vulputate, sed sodales dui dapibus. Quisque ultricies pulvinar maximus. Nulla urna turpis, finibus vel nisl ut, dapibus pharetra elit. Praesent ac gravida est. Aliquam aliquam dolor eu eleifend pellentesque.

          Duis non eleifend lectus. Nulla tincidunt elit urna, sed blandit sapien congue quis. Ut ullamcorper neque sit amet tristique venenatis. Quisque a arcu eget urna dictum sagittis. Cras molestie eget turpis ut scelerisque. Praesent suscipit nisi ut est mollis, elementum dapibus lectus mollis. Etiam pharetra pellentesque lacus, ac placerat nisi. Mauris sit amet velit velit. Morbi turpis nisi, vehicula non mauris nec, dictum commodo ligula. Proin viverra tincidunt ante, vitae lobortis elit aliquam in. Cras odio tortor, pretium eu est ut, rutrum malesuada ante. Nulla sed dui vitae risus imperdiet egestas vitae at odio. Nunc consequat neque a pretium aliquam. Vivamus et diam sed mauris dapibus tempus at fermentum lorem. Integer vitae bibendum est, non ullamcorper purus.

          Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur scelerisque elit cursus gravida lacinia. In tincidunt diam id urna faucibus, eget posuere mauris fermentum. Ut risus nisl, dapibus eu eros eget, faucibus laoreet velit. Quisque molestie ex nunc, ut sagittis sem lobortis a. Integer pharetra interdum tortor vitae rhoncus. Praesent ornare pulvinar eros, ut rutrum metus. Etiam commodo laoreet massa, nec iaculis magna finibus ut. Aenean velit diam, euismod ac consequat gravida, congue sit amet tortor. Nam laoreet sit amet quam pellentesque lacinia. Donec gravida in sem vel cursus.

          Sed eu accumsan sem. Donec vehicula, justo a vehicula bibendum, lacus sem lobortis mauris, et sodales velit neque id dui. Praesent in mauris at nunc viverra cursus. Sed vel dolor quis dolor pharetra euismod ut a libero. Suspendisse commodo ultricies dui, in hendrerit neque condimentum eu. Maecenas ullamcorper ligula justo, et faucibus odio lacinia id. Quisque sapien ante, dignissim a lacus a, bibendum maximus augue. Fusce congue ut quam in dignissim. Etiam luctus enim at tortor ultrices fermentum.

          Mauris sed consectetur nisl, et suscipit velit. Nunc non fringilla enim. Sed condimentum in ipsum a dictum. Vestibulum congue scelerisque posuere. Vivamus posuere risus et tellus dictum, et fermentum sapien euismod. Praesent et massa est. Etiam id mi id ante facilisis fringilla in a justo. Integer quis auctor enim. Proin consequat commodo sapien id ullamcorper. Suspendisse odio turpis, maximus nec risus scelerisque, vestibulum dignissim diam. Duis et est ex. Curabitur id ligula id justo pretium convallis nec quis libero. Fusce lorem magna, luctus non ullamcorper sed, viverra ullamcorper odio. Nullam tempus dolor quis purus lacinia, egestas finibus tellus finibus. Nam et tellus sagittis, rutrum felis nec, finibus enim. Vivamus felis ligula, lobortis quis interdum a, ornare ac mauris.

          Ut fermentum blandit ex vel hendrerit. Sed elementum nisl metus, ac tincidunt turpis sagittis id. Proin interdum faucibus mi sed bibendum. Nunc condimentum ut nunc id viverra. Curabitur malesuada turpis ut iaculis pharetra. Morbi maximus sem sit amet nulla gravida molestie. Phasellus suscipit purus a neque hendrerit, nec congue lorem fringilla. Fusce eget facilisis metus. In velit eros, placerat id ornare at, cursus id justo. Ut et pellentesque ex.

          Aliquam felis libero, pretium vel porta in, feugiat quis tellus. Ut tincidunt, leo non finibus tincidunt, lacus orci consectetur leo, non bibendum augue magna ac ex. Integer tempor, felis quis tempus ultrices, erat elit scelerisque elit, eget volutpat sem lorem sed nulla. Pellentesque lacinia lacus eget sem imperdiet gravida. Morbi lobortis eget nisi id volutpat. In urna quam, condimentum eget velit non, gravida fringilla orci. Quisque ante urna, pellentesque non euismod a, tincidunt a odio. Donec a commodo nunc. Praesent vestibulum semper lobortis. Maecenas pulvinar dui in lorem cursus consectetur. Maecenas at ullamcorper dolor. Morbi in odio orci.

          Aenean ultrices est at tellus tempus scelerisque. Quisque et ultrices nibh. In fermentum volutpat odio. Aliquam condimentum nisi eu ipsum placerat faucibus. Morbi sapien nulla, gravida sed vulputate in, cursus ac ligula. Suspendisse potenti. Duis id iaculis turpis. Morbi elementum libero at volutpat ultricies. Aenean sagittis tincidunt porta. Sed pretium ut urna ac tristique. Integer iaculis iaculis aliquam. Fusce mollis volutpat turpis at pretium. Mauris in imperdiet dolor. Ut eget neque cursus, hendrerit dui pellentesque, bibendum lectus. Cras tortor turpis, auctor quis arcu vitae, pretium rutrum felis. Vestibulum imperdiet accumsan ultrices.

          In mauris turpis, vulputate nec dapibus ut, tempor in tellus. Maecenas sollicitudin pellentesque viverra. Duis euismod rutrum leo. Integer suscipit nulla nec est tempor, sed congue orci vestibulum. Quisque sed ultrices quam. Curabitur sagittis arcu non metus ornare ullamcorper. Fusce iaculis est id sapien luctus dignissim.

          Mauris consectetur libero ac purus feugiat bibendum. Integer at hendrerit diam, in accumsan nisl. Nulla ut ipsum in odio fermentum finibus quis ac ex. Integer blandit nec ligula ac commodo. Phasellus ut tellus in lectus mattis interdum sit amet eu nisl. Morbi eget bibendum tortor. Mauris porttitor pulvinar mollis. Nunc nec neque viverra, tincidunt orci vel, sollicitudin mauris. Cras egestas, orci eget molestie cursus, augue orci dapibus sem, eget porta risus erat in dolor.

          Praesent posuere erat semper ex semper maximus. Ut placerat fringilla feugiat. Aenean fringilla turpis felis, et dapibus sapien rutrum sed. Integer vel magna tortor. Vestibulum at diam urna. Nulla non dolor ut lectus dapibus eleifend mattis eu lorem. Integer cursus mauris lacus, et sollicitudin odio varius et. Donec consequat fermentum ligula nec tempus. Ut auctor velit eros, eu fermentum felis tristique a. Cras condimentum mi eu purus pharetra dignissim. Aenean euismod eu risus eu finibus.
          </div>
      </div>

      
      <button type="button" class="btn btn-success pull-right" data-dismiss="modal">Accept</button>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>


<script>
  $(document).ready(function() {
    model = new ViewModel(<?php echo json_encode($data) ?>);
    ko.applyBindings(model);

    model.init();
  })
</script>