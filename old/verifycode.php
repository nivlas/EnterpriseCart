<?php
/*****************************9_3.php************************************/
session_start();
//������֤���ȡ���ַ�,ȥ�����ױ��ϵ��ַ�
$chars="23456789ABCDEFGHJKLMNPRSTWXY";
$string="";
//������ַ�����ȡ���ַ���������ַ���
for($i=0;$i<5;$i++){
	//�������ʱ������
	srand((double)microtime()*1000000);
	//ȡ�������
	$rand    =rand(0,strlen($chars)-1);
	//�����������ȡ���ַ�
	$string .= substr($chars,$rand,1);
}
//ע��һ��SESSION������������һҳ��ȡ��֤��
$_SESSION["string"]=strtolower($string);
//���ͼ�θ�ʽ
Header("Content-type: image/png");
//����ͼ�ο����
$imageWidth = 85;
$imageHeight = 22;
//ʹ��imagecreate()��������ͼ��
$im = imagecreate($imageWidth,$imageHeight);
//����ͼ�α���ɫ
$backColor = ImageColorAllocate($im, rand(220,255),rand(220,255),rand(220,255)); //����ɫ
//���ͼ����ɫ
imagefilledrectangle($im, 0, 0, $imageWidth, $imageHeight, $backColor);
//����ڻ����ϻ�100����ɫ��
for($i=0;$i<100;$i++){ //���ߵ�
	$dotColor = ImageColorAllocate($im, rand(0,255),rand(0,255),rand(0,255)); //���õ����ɫ
	$x = rand(0,$imageWidth); $y = rand(0,$imageHeight);
	//ʹ��imagesetpixel()����
	imagesetpixel($im, $x, $y, $dotColor);
}
for($i=0;$i<strlen($string);$i++){
	//�����ֵ���ɫ
	$frontColor = ImageColorAllocate($im, rand(0,120),rand(0,120),rand(0,120));
	//���ַ�д��ͼ����
	imagestring($im,10, rand(15*$i+1,15*$i+10), rand(0,5), substr($string,$i,1),$frontColor);
}
//���PNG��ʽͼ��
imagepng($im);
//�ͷ�����
imagedestroy($im);
exit();
?>