$(function() {
    var init = function() {
      // idはhtmlに1つなので $(#id名) とした方が高速
      var $fileList = $('#file_list');

      $fileList
      // ファイル削除イベント
      .on('click.deleteFile', '.js-deleteBtn', function(evt) {
        var $li = $(this).closest('.js-file');
        // input[type="file"]が1つ以上の場合は該当のinpuタグを削除する
        if($fileList.find('.js-file').length > 1) {
          $li.remove();
        } else {
          $li.find('.js-thumb').remove();
        }
        return false;
      })
      // ファイル選択時のイベント
      .on('change.inputFile', '.js-inputFile', function(evt) {
        var $input = $(this),
            fileID = $input.data('fid'),
            $li = $input.closest('.js-file'),
            $newLi;

        if(evt.target.files.length) {
          $newLi = $li.clone();
          $newLi.find('.js-inputFile').val(null);
          // 新しくinputタグを追加する
          $fileList.append($newLi);

          $.each(evt.target.files, function(i, elm) {
            var file = this,
                fileName = file.name,
                reader;

            // サムネイル画像生成
            reader = new FileReader();
            reader.readAsDataURL(file);

            // サムネイルを表示させる処理
            reader.onloadend = function(evt) {
              var fileReader = this;
              if(fileReader.result) {
                var thumb = '<div class="js-thumb"><img src="' + fileReader.result + '" width="150px" height="150px" style="max-width:100%;height:auto;">' + fileName + '<button class="js-deleteBtn">削除</button></div>';
                $li.append(thumb);
              }
              return this;
            };
          });
          $input.hide();
        } else {
          // ファイルが選択がキャンセルされた時 既にサムネイルが表示されてるなら削除する
          $li.find('.js-deleteBtn').trigger('click');
        }
        return this;
      });
    };
    init();
  });

