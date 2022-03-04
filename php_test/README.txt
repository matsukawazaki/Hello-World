[obj_1]
drug は obj_1
tmp  は obj_tmp
その他は obj_ext

add 時には a フラグを立てる
repair 時には r フラグを立てる
no change 時には n フラグを立てる
これにより新規は 青
          修正は 赤

[database]
database : denkaru2_test
		|-- drugs
		|-- prescription

drugs
	id(int)
	name(varchar 50) 量も含めて登録 オランザピン(2.5) のように
	Gname(varchar 50) 一般名
	amount(float(6,2)) 6:全体の桁数 2:小数点以下の桁数
	type(varchar 2) 錠剤などの種類
	unit(varchar 2) mg g μg などの単位
	classification(varchar 20 -> int)) 抗精神病薬、うつ病、胃腸、高血圧 など 
	option(varchar 100)
	max_dose(int)
	frequency(int)

create table drugs(drug_id int AUTO_INCREMENT PRIMARY KEY,drug_name varchar(50),drug_amount int,drug_type varchar(2),drug_unit varchar(4),drug_classification varchar(20),drug_option varchar(100),max_dose int,frequency int);

prescription_2022
	id(int)
	d_id(int) FOREIGN KEY
	p_id(int) FOREIGN KEY
	date(int)
	drugs(varchar 300)

create table prescription_2022(rp_id int AUTO_INCREMENT PRIMARY KEY,d_id int,p_id int,date int,drugs varchar(300),FOREIGN KEY(d_id) references user(id),FOREIGN KEY(p_id) references patiant(id));

prescription.drugs
	{1:{1:{drug:,amount:,unit:,times:,timing:,
--->  {0:{0:{drug:,amount:,unit:,times:,timing:,  2022/02/08
--->  {"d":{ },"t":{ },"e":{ }}  2022/02/24
       "d" keys {rp_type,rp_drug,rp_amount,rp_times,rp_check,rp_division,rp_before,rp_days}
       "t" keys 

drugs を object にする必要があるのか？ 配列でも良い？
配列の場合データベースに登録できるのか？


drug_type
内服(d)
錠剤 1錠1X  'dt':{0:{'t':'錠'}}
包剤 1包1X  'dP':{'p':'包'}
粉末 200mg1X  'dp':{0:{'mg':'mg'},1:{'g':'g'}}
液剤 1包1X  'dL':{0:{'p':'包'}}
液量 200mg1X  'dl':{0:{'mg':'mg'},1:{'ml':'ml'}}
漢方 食前にチェックを入れる 'dk':{0:{'p':'包'}}

以下は頓服(t)とする
ピコスルファート 'tl'
イソジンガーグル 'tl'

外用(e)
座薬 'ex'
塗り薬 'eo'
点眼 'ee'
湿布 'es'

classification
精神科 -> 1
 icd 0
 icd 1
 icd 2
 icd 3
 icd 4
 icd 6
内科 -> 2
 消化器 0 (胃腸:0 肝臓:1 ?? 全てを一意の数字で表した方が良い？
 循環器 1 (HT:0 抗血栓:1 利尿:2 不整脈:3 昇圧:4
 呼吸器 2 (上気道炎:0 喘息:1
 内分泌 3 (DM:0 HL:1 甲状腺:1
 腎臓   4 (痛風:0 利尿:2
 神経   5
 アレ   6
 感染症 7
その他（整形、泌尿器、眼科、耳鼻科）-> 3
 整形   0
 泌尿器 1
 眼科   2
 耳鼻科 3

100:抗精神病薬 101:抗うつ薬
200:DM

rp_drug:[1,"オランザピン","tab",5,"mg"]
               |--> name only,no amount info for using as retrieve word

20220228
rp_option を追加した
obj['e'] を作成
変更時の設定 n:新規追加 c:変更

20220302
db_access
  res[0]['drug_type'] == 'p' の場合を追記
make_tmp_select() 
  rp_type.options[selected] == 2 の場合を少し修正
!!!
rp_option の横にselect boxを作成
  rp_option の候補をselect で作成し、選択時に自動的にrp_optionに反映させる

20220303
rp_drugSelect onChange 時に合わせて rp_option_ex の中身を変化させる
drugs classification varchar -> int の方が良さそう
    最下位分類に数字をつける
!!!
頓服時の rp2 を作成
頓服の remove がおかしい
table は drug tmp ex それぞれ作成した方がよい？

20220304
table を d t e で分けて表示することとした
それに伴い、btn click時の挙動が少しおかしくなっている 要修正！！
印刷時は、また別の処理で
