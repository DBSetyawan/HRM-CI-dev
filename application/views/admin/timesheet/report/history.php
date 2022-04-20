<?php
/* Attendance view
*/
// var_dump($history);
$system = $this->Xin_model->read_setting_info(1);
?>
<?php $session = $this->session->userdata('username');?>
<?php $get_animate = $this->Xin_model->get_content_animate();?>
<?php $user_info = $this->Xin_model->read_user_info($session['user_id']);?>

<div class="box <?php echo $get_animate;?>">
  <div class="box-header with-border">
    <h3 class="box-title">History Log Pegawai</h3>
  </div>
  <div class="box-body">
    <div class="box-datatable table-responsive">
      <table class="datatables-demo table table-striped table-bordered" id="xin_table1">
        <thead>
          <tr>
                <th>Clock In</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th width="20%">Address</th>
                <th>Image</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($history as $key => $value) {
            ?>
            <tr>
                <td><?=$value->clock_in_log;?></td>
                <td><?=$value->clock_in_latitude_log;?></td>
                <td><?=$value->clock_in_longitude_log;?></td>
                <td><?=$value->clock_in_address_log;?></td>
                <td>
                    <?php if(!empty($value->clock_in_image_log)) : ?>
                    <img height="80" width="80" src="data:image/jpeg||image/gif||image/png;base64,<?=str_replace('[removed]', '', $value->clock_in_image_log);?>">
                <?php endif; ?>
                </td>
                <td>
                    <?php echo (!empty($value->is_luarkota)? " Luar Kota " : ""); ?>
                    <?php echo (!empty($value->is_dangerarea)? " Danger Area " : ""); ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
      </table>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-10" id="checkbox_map_options" style="display: none;">
                    <div class="form-group">
                        <input type="checkbox" name="check_area" checked="" id="check_area"> Tampilkan Area
                        <input type="checkbox" name="check_positif" checked="" id="check_positif"> Tampilkan Positif Covid
                    </div>                            
                </div>
            </div>
            <div id="mapsin" class="col-md-12" style="height: 280px" ></div>                
        </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="<?php echo base_url();?>skin/hrsale_assets/vendor/datatables/media/css/dataTables.min.css">

<script src="<?php echo base_url();?>skin/hrsale_assets/vendor/datatables-1/datatables.min.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo $system[0]->google_maps_api_key;?>&callback=initMap">    </script>

<script type="text/javascript">   
$(function(){

    var xin_table = $('#xin_table1').dataTable({
        "bDestroy": true,
        "lengthMenu": [[3,5,10, 25, 50], [3,5,10, 25, 50]],
        dom: 'lBfrtip',
        "buttons": ['csv', 'excel', 'pdf', 'print'], // colvis > if needed
        "fnDrawCallback": function(settings){
            $('[data-toggle="tooltip"]').tooltip();          
        },
    });
});
//http://maps.google.com/mapfiles/ms/icons/blue-dot.png

var mapsin, infoWindowIn,markerIn = [], history_data = <?=json_encode($history)?>;
var allowedAreaShape = null;

var allowedArea = [
    {lng : 112.4810514830049, lat : -6.891378969293006 },
    {lng : 112.465053, lat : -6.870359},
    {lng : 112.447906, lat : -6.872308},
    {lng : 112.443139, lat : -6.872905},
    {lng : 112.438802, lat : -6.871669},
    {lng : 112.438379, lat : -6.872990},
    {lng : 112.439324, lat : -6.874780},
    {lng : 112.439975, lat : -6.879179},
    {lng : 112.420049, lat : -6.911899},
    {lng : 112.377279, lat : -6.950411},
    {lng : 112.376644, lat : -6.952429},
    {lng : 112.373359, lat : -6.961460},
    {lng : 112.371645, lat : -6.963697},
    {lng : 112.369413, lat : -6.970513},
    {lng : 112.366925, lat : -6.977627},
    {lng : 112.365938, lat : -6.991598},
    {lng : 112.365938, lat : -6.991598},
    {lng : 112.535076, lat : -7.060519},
    {lng : 112.472550, lat : -7.119801},
    {lng : 112.467587, lat : -7.161148 },
    {lng : 112.492196, lat : -7.186653 },
    {lng : 112.401883, lat : -7.239703 },
    {lng : 112.394270, lat : -7.267630 }, //tes
    {lng : 112.400497, lat : -7.307900 },
    {lng : 112.364768, lat : -7.326629 },
    {lng : 112.391785, lat : -7.334609 },
    {lng : 112.475967, lat : -7.311088 },
    {lng : 112.468414, lat : -7.382521 },
    {lng : 112.479401, lat : -7.403630 },
    {lng : 112.463093, lat : -7.429956 },
    {lng : 112.457428, lat : -7.436594 },
    {lng : 112.454982, lat : -7.447516 },
    {lng : 112.576218, lat : -7.494030 },
    {lng : 112.623854, lat : -7.534931 },
    {lng : 112.670631, lat : -7.560372 },
    {lng : 112.703247, lat : -7.546739 }, 
    {lng : 112.710285, lat : -7.559134 }, 
    {lng : 112.727795, lat : -7.573087 }, 
    {lng : 112.762127, lat : -7.578873 }, 
    {lng : 112.778091, lat : -7.572747 }, 
    {lng : 112.831650, lat : -7.558113 }, 
    {lng : 112.835770, lat : -7.569684 }, 
    {lng : 112.844009, lat : -7.579894 }, 
    {lng : 112.865124, lat : -7.583978 }, 
    {lng : 112.898598, lat : -7.581255 }, 
    {lng : 112.8858971250737, lat : -7.538680969099834 },
    {lng : 112.8510128985872, lat : -7.43445917622328 },
    {lng : 112.8623503696434, lat : -7.30885065610215 },
    {lng : 112.8623339014921, lat : -7.278706753765718 },
    {lng : 112.8299733371354, lat : -7.235407638676707 },
    {lng : 112.7848900901381, lat : -7.189659931384049 },
    {lng : 112.7386736197416, lat : -7.184059863251744 },
    {lng : 112.7032329755609, lat : -7.183468464137829 },
    {lng : 112.679200300688, lat : -7.157756110249143 },
    {lng : 112.6621380315954, lat : -7.121348020637834 },
    {lng : 112.6601684189282, lat : -7.00723588598849 },
    {lng : 112.6273095762686, lat : -6.973374994224247 },
    {lng : 112.6374247083357, lat : -6.916277748177824 },
    {lng : 112.6304759821946, lat : -6.872977863811998 },
    {lng : 112.6109498610979, lat : -6.82492560770787 },
    {lng : 112.5907389061413, lat : -6.801715360573999 },
    {lng : 112.5408393334162, lat : -6.80109843911027 },
    {lng : 112.5067364353248, lat : -6.831215955020149 },
    {lng : 112.4947391534331, lat : -6.8550488749138 },
    {lng : 112.4890514830049, lat : -6.891378969293006 },

  ];



function initMap() {
    mapsin = new google.maps.Map(document.getElementById('mapsin'), {
        center: {lat: -7.3356584, lng: 112.75389129999999},
        zoom: 8
    });

    infoWindowIn = new google.maps.InfoWindow;
    get_data_positif();
    setPOlygon();
    $('#checkbox_map_options').show();
    $.each(history_data,function(i,d){
        var danger_area = d['is_dangerarea'];
        var lat = d.clock_in_latitude_log;
        var long = d.clock_in_longitude_log;
        if(parseFloat(lat) != 0.0){
            if(d.is_luarkota > 0){
                markerIn.push(new google.maps.Marker({
                            map: mapsin,
                            draggable: false,
                            label : "LUAR KOTA!",
                            animation: google.maps.Animation.BOUNCE,
                            position: {lat: parseFloat(lat), lng: parseFloat(long)}
                          }));
            }else if(parseInt(danger_area) > 0){
                markerIn.push(new google.maps.Marker({
                            map: mapsin,
                            draggable: false,
                            label : "DANGER AREA",
                            animation: google.maps.Animation.BOUNCE,
                            position: {lat: parseFloat(lat), lng: parseFloat(long)}
                          }));                    
            }else{
                markerIn.push(new google.maps.Marker({
                            map: mapsin,
                            draggable: false,
                            animation: google.maps.Animation.DROP,
                            position: {lat: parseFloat(lat), lng: parseFloat(long)}
                          }));                    
            }
        }

    });
}


data_history = [];
markerPositif = [];

function get_data_positif(){
    $.ajax({
        url : "<?=base_url('admin/timesheet/get_positif_covid')?>",
        dataType : "JSON",
        success : function(data){
            $.each(data,function(i,d){
                var lat = d.lat,lon = d.lon,kota = d.kabkota,kec = d.kecamatan,kelurahan = d.kelurahan;
                markerPositif.push(new google.maps.Marker({
                            map: mapsin,
                            draggable: false,
                            icon  : "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                            animation: google.maps.Animation.DROP,
                            title : d.id, 
                            position: {lat: parseFloat(lat), lng: parseFloat(lon)}
                          }));
            })
        }
    })
}

function setPOlygon(){
    allowedAreaShape = new google.maps.Polygon({
        paths: allowedArea,
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35
    });

    allowedAreaShape.setMap(mapsin);
}


function removePostMarker(){
    for(var i=0 ;i<markerIn.length ;i++){
        markerIn[i].setMap(null);
    }
}

function addPostitifMarker(){
    for(var i=0 ;i<markerPositif.length ;i++){
        markerPositif[i].setMap(mapsin);
    }
}

function removePostitifMarker(){
    for(var i=0 ;i<markerPositif.length ;i++){
        markerPositif[i].setMap(null);
    }
}

function removePolygon(){
    if(allowedAreaShape != null){
        allowedAreaShape.setMap(null);
    }
}

$(function(){
    $('#check_area').on('change',function(){
        var check = $(this).is(":checked");
        if (check) {
            setPOlygon();
        }else{
            removePolygon();
        }
    })
    $('#check_positif').on('change',function(){
        var check = $(this).is(":checked");
        if (check) {
            addPostitifMarker();
        }else{
            removePostitifMarker();
        }
    })
})


</script>