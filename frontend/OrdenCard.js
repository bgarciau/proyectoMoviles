import { View, Text } from 'react-native'
import React from 'react'

export default function OrdenCard(item) {
  return (
    <View style={{
        borderRadius: 40,
        backgroundColor: '#DC7633',
        marginTop: 250,
        height: 450,
        width: 250
    }}>
<Text style={{
    color: 'white',
    fontSize: 20,
    textAlign: 'center',
    marginTop: 20
}}>Orden de compra:{item.id}</Text>
<Text style={{
    color: 'white',
    fontSize: 20,
    marginLeft:20,
    // textAlign: 'center',
    marginTop: 20
}}>Estado:{item.state}</Text>
<Text style={{
    color: 'white',
    fontSize: 20,
    marginLeft:20,
    // textAlign: 'center',
    marginTop: 20
}}>Mesero:{item.waiter_id}</Text>
<Text style={{
    color: 'white',
    fontSize: 20,
    marginLeft:20,
    // textAlign: 'center',
    marginTop: 20
}}>Cliente:{item.client_id}</Text>
<Text style={{
    color: 'white',
    fontSize: 20,
    marginLeft:20,
    // textAlign: 'center',
    marginTop: 20
}}>Mesa:{item.table}</Text>
<Text style={{
    color: 'white',
    fontSize: 20,
    marginLeft:20,
    // textAlign: 'center',
    marginTop: 20
}}>Plato:{item.plate_id}</Text>
<Text style={{
    color: 'white',
    fontSize: 20,
    marginLeft:20,
    // textAlign: 'center',
    marginTop: 20
}}>Bebida:{item.drink_id}</Text>
<Text style={{
    color: 'white',
    fontSize: 20,
    marginLeft:20,
    // textAlign: 'center',
    marginTop: 20
}}>Total:{item.total}</Text>

    </View>
  )
}