<div class="modal fade" id="komenSkema" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="skemaFormPerbaikan">
                @csrf
                <input type="hidden" name="userid" id="userId" value="{{$data->users_id}}" />
                <div class="form-group">
                    <label for="namaSkema">Nama Skema</label>
                    <select class="" id="nama_jabker">
                        @foreach ($data->skema as $item)
                        <option value="{{$item->jabker}}">{{$item->jabker}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="kesesuaian">Komen Skema</label>
                  <input type="text" class="form-control" placeholder="Comment..." name="komen_skema" id="komen_skema" />
              </div>
        </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="komenAsesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="AsesorFormPerbaikan">
                @csrf
                <input type="hidden" name="userid" id="userId" value="{{$data->users_id}}" />
                <div class="form-group">
                    <label for="namaSkema">Nama Asesor</label>
                    <select id="nama_asesor">
                        @foreach ($data->asesor as $item)
                        <option value="{{$item->nama_asesor}}">{{$item->nama_asesor}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="kesesuaian">Komen Asesor</label>
                  <input type="text" class="form-control" placeholder="Comment..." name="komen_asesor" id="komen_asesor" />
              </div>
        </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="komenTuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="TukFormPerbaikan">
                @csrf
                <input type="hidden" name="userid" id="userId" value="{{$data->users_id}}" />
                <div class="form-group">
                    <label for="namaSkema">Nama TUK</label>
                    <select id="nama_tuk">
                        @foreach ($data->tuk as $item)
                        <option value="{{$item->nama_tuk}}">{{$item->nama_tuk}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="kesesuaian">Komen TUK</label>
                  <input type="text" class="form-control" placeholder="Comment..." name="komen_asesor" id="komen_tuk" />
              </div>
        </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>