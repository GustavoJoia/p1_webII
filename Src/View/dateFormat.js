export default function dateFormat(datetime){
    let split = datetime.split(' ')
    let split_date = split[0].split('-')
    let split_time = split[1].split(':')

    let new_date = split_date[2]+'/'+split_date[1]+'/'+split_date[0]
    let new_time = split_time[0]+':'+split_time[1]

    return new_date+' '+new_time

}