<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if(isset($_GET["op"]) && $_GET["op"] == "vote-for"){
    $id = $_GET["id"];
    $value = CIBlockElement::GetProperty(2, $id, array("sort" => "asc"), Array("CODE"=>"VOTE_FOR"));
    if($ar_props = $value->Fetch())
    $voteFor = $ar_props["VALUE"];
    CIBlockElement::SetPropertyValuesEx($id, false, array("VOTE_FOR" => $voteFor+1));;
    var_dump($voteFor);
}
else if(isset($_GET["op"]) && $_GET["op"] == "vote-against"){
    $id = $_GET["id"];
    $value = CIBlockElement::GetProperty(2, $id, array("sort" => "asc"), Array("CODE"=>"VOTE_AGAINST"));
    if($ar_props = $value->Fetch())
    $voteAgainst = $ar_props["VALUE"];
    CIBlockElement::SetPropertyValuesEx($id, false, array("VOTE_AGAINST" => $voteAgainst+1));
}
?>
<div class="news-list">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="news-item">

            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">

                <h2><?=$arItem["NAME"]?></h2>

            </a>

            <?=CFile::ShowImage($arItem['PREVIEW_PICTURE'])?>

            <?=$arItem['PREVIEW_TEXT']?>
            <div class="rating">
                <p><?=$arItem["PROPERTIES"]["VOTE_FOR"]["NAME"]?>:<span class="value-for<?=$arItem['ID']?>"><?=$arItem["PROPERTIES"]["VOTE_FOR"]["VALUE"]?></span></p>
                <p><?=$arItem["PROPERTIES"]["VOTE_AGAINST"]["NAME"]?>:<span class="value-against<?=$arItem['ID']?>"><?=$arItem["PROPERTIES"]["VOTE_AGAINST"]["VALUE"]?></span></p>
                <button class="vote-for" data-id="<?=$arItem['ID']?>">+1</button>
                <button class="vote-against" data-id="<?=$arItem['ID']?>">-1</button>
            </div>
        </div>
    <?endforeach;?>
</div>

<?=$arResult['NAV_STRING']?>