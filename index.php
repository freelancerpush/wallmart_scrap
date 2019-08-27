<?php 
$key='xxxxxx';
//$cat=file_get_contents('http://api.walmartlabs.com/v1/taxonomy?apiKey='.$key.'&format=json');
//print_r(json_decode($cat, TRUE));



//echo $category_based='http://api.walmartlabs.com/v1/paginated/items?category=132901&specialOffer=rollback&apiKey='.$key.'&format=json';
echo $searchbased='http://api.walmartlabs.com/v1/search?apiKey='.$key.'&query=Smart+Home';

$data=json_decode(file_get_contents($searchbased), TRUE);
echo '<pre>';print_r($data);
//echo outputCsv('product.csv', $data);

function outputCsv($fileName, $assocDataArray)
{
    ob_clean();
    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private', false);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=' . $fileName);    
    if(isset($assocDataArray['0'])){
        $fp = fopen('php://output', 'w');
        fputcsv($fp, array_keys($assocDataArray['0']));
        foreach($assocDataArray AS $values){
            fputcsv($fp, $values);
        }
        fclose($fp);
    }
    ob_flush();
}
?>