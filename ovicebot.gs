//ハイパーパラメータ
var DAYS = 0 ;// 何日前まで削除するか
var LIMIT = '2'; //エラー429対策として削除件数制限(引数の都合上シングルクォーテーションで囲む必要あり　例’5')
var STAYSECOND = 10; //エラ＝429対策、deleteの遅延時間(秒)

//mainコード
function cleanChannels()
{
  var sheet = SpreadsheetApp.getActiveSheet();
  var values = sheet.getDataRange().getValues();

  var channelNames = [];
  for (var i = 1; i < values.length; ++i) {
    channelNames.push(values[i][0]);
  }

  var token = PropertiesService.getScriptProperties().getProperty('token_key');

  for (var index in channelNames) {
    var channelName = channelNames[index];
    cleanChannel(token, channelName);
  }
}

//チャンネル内投稿削除
function cleanChannel(token, channelName)
{
  var channelId = getChannelId(token, channelName);
  if (channelId.length == 0) {
    return;
  }

  var date = new Date();
  date.setDate(date.getDate() - DAYS);
  var timestamp = Math.round(date.getTime() / 1000) + '.000000';

  do{
    var result = getChannelHistory(token, channelId, timestamp);
    if (result.ok) {
      // var count = 0;
      for (var index in result.messages) {
        var message = result.messages[index];
        deleteChat(token, channelId, message.ts);
      }
    }
    Logger.log('sleep');
    Utilities.sleep(STAYSECOND* 1000);
  } while (result.ok && result.has_more);
}

//チャンネル名->チャンネルID取得
function getChannelId(token, channelName)
{
  var channelId = '';
  var result = getChannelList(token);
  if (result.ok) {
    for (var index in result.channels) {
      var channel = result.channels[index];
      if (channel.name == channelName) {
        channelId = channel.id;
        Logger.log("\"#%s\" Channel ID = \"%s\"", (channel.name), channelId);
        break;
      }
    }
  }
  return channelId;
}

//チャンネル一覧取得
function getChannelList(token)
{
  var url = 'https://slack.com/api/conversations.list';
  var options = {
   "method": "get",
   "contentType": "application/x-www-form-urlencoded",
   "payload": {
     "token": token,
   }
  };
  var response = UrlFetchApp.fetch(url, options);
  // Logger.log("getChannelList response = [%s]",response);
  return JSON.parse(response);
}

//チャンネル内投稿取得
function getChannelHistory(token, channelId, timestamp)
{
  var latest = timestamp;
  var url = 'https://slack.com/api/conversations.history';
  var options = {
   "method": "get",
   "contentType": "application/x-www-form-urlencoded",
   "payload": {
     "token": token,
     "channel" : channelId,
     "limit" : LIMIT,
     "inclusive" : true,
     "latest" : latest,
   }
  };

  var response = UrlFetchApp.fetch(url, options);
  // Logger.log("getChannelList response = [%s]",response);
  return JSON.parse(response);
}

// 投稿削除
function deleteChat(token, channelId, timestamp)
{
  var url = 'https://slack.com/api/chat.delete';
  var options = {
   "method": "post",
   "contentType": "application/x-www-form-urlencoded",
   "payload": {
     "token": token,
     "channel" : channelId,
     "ts" : timestamp
   }
  };
  var response = UrlFetchApp.fetch(url, options);
  Logger.log("----- deleteChat -----\n%s", response);
  return JSON.parse(response);
}